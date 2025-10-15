<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Statistics;

use GoSuccess\Digistore24\Api\Response\Statistics\StatsDailyAmountsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class StatsDailyAmountsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'daily_amounts' => [
                    [
                        'date' => '2024-01-15',
                        'amount' => 1250.50,
                        'currency' => 'EUR',
                        'sales_count' => 25,
                    ],
                    [
                        'date' => '2024-01-16',
                        'amount' => 980.00,
                        'currency' => 'EUR',
                        'sales_count' => 18,
                    ],
                ],
            ],
        ];
        $response = StatsDailyAmountsResponse::fromArray($data);
        
        $this->assertInstanceOf(StatsDailyAmountsResponse::class, $response);
        $dailyAmounts = $response->getDailyAmounts();
        $this->assertCount(2, $dailyAmounts);
        $this->assertSame('2024-01-15', $dailyAmounts[0]['date']);
        $this->assertSame(1250.50, $dailyAmounts[0]['amount']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'daily_amounts' => [
                        [
                            'date' => '2024-01-20',
                            'amount' => 500.00,
                            'sales_count' => 10,
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = StatsDailyAmountsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(StatsDailyAmountsResponse::class, $response);
        $this->assertCount(1, $response->getDailyAmounts());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = StatsDailyAmountsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

