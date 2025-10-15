<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Payout;

use GoSuccess\Digistore24\Api\Response\Payout\ListPayoutsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListPayoutsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'payout_list' => [
                    [
                        'payout_id' => 'PO123',
                        'amount' => 1500.00,
                        'date' => '2024-01-15'
                    ],
                    [
                        'payout_id' => 'PO456',
                        'amount' => 2500.00,
                        'date' => '2024-02-15'
                    ]
                ]
            ]
        ];
        $response = ListPayoutsResponse::fromArray($data);
        
        $this->assertInstanceOf(ListPayoutsResponse::class, $response);
        $this->assertCount(2, $response->getPayoutList());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'payout_list' => [
                        [
                            'payout_id' => 'PO789',
                            'amount' => 3000.00
                        ]
                    ]
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ListPayoutsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListPayoutsResponse::class, $response);
        $this->assertCount(1, $response->getPayoutList());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListPayoutsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

