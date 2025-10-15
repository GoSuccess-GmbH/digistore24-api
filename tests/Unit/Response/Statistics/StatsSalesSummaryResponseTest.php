<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Statistics;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Statistics\StatsSalesSummaryResponse;
use PHPUnit\Framework\TestCase;

final class StatsSalesSummaryResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'summary' => [
                    'total_sales' => 450,
                    'total_revenue' => 45000.50,
                    'currency' => 'EUR',
                    'period_start' => '2024-01-01',
                    'period_end' => '2024-01-31',
                    'average_order_value' => 100.00,
                ],
            ],
        ];
        $response = StatsSalesSummaryResponse::fromArray($data);

        $this->assertInstanceOf(StatsSalesSummaryResponse::class, $response);
        $summary = $response->getSummary();
        $this->assertSame(450, $summary['total_sales']);
        $this->assertSame(45000.50, $summary['total_revenue']);
        $this->assertSame('EUR', $summary['currency']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'summary' => [
                        'total_sales' => 100,
                        'total_revenue' => 10000.00,
                        'currency' => 'USD',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = StatsSalesSummaryResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(StatsSalesSummaryResponse::class, $response);
        $summary = $response->getSummary();
        $this->assertSame(100, $summary['total_sales']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = StatsSalesSummaryResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
