<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Payout;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Payout\StatsExpectedPayoutsResponse;
use PHPUnit\Framework\TestCase;

final class StatsExpectedPayoutsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'total_expected' => 5000.00,
                'payout_count' => 15,
                'next_payout_date' => '2024-02-01',
            ],
        ];
        $response = StatsExpectedPayoutsResponse::fromArray($data);

        $this->assertInstanceOf(StatsExpectedPayoutsResponse::class, $response);
        $this->assertArrayHasKey('total_expected', $response->getData());
        $this->assertSame(5000.00, $response->getData()['total_expected']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'total_expected' => 7500.00,
                    'payout_count' => 20,
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = StatsExpectedPayoutsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(StatsExpectedPayoutsResponse::class, $response);
        $this->assertSame(7500.00, $response->getData()['total_expected']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = StatsExpectedPayoutsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
