<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Statistics;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Statistics\StatsSalesResponse;
use PHPUnit\Framework\TestCase;

final class StatsSalesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'sales' => [
                    [
                        'sale_id' => 'SALE001',
                        'product_id' => '100',
                        'amount' => 99.99,
                        'currency' => 'EUR',
                        'date' => '2024-01-15 10:30:00',
                        'buyer_email' => 'buyer1@example.com',
                    ],
                    [
                        'sale_id' => 'SALE002',
                        'product_id' => '200',
                        'amount' => 149.50,
                        'currency' => 'USD',
                        'date' => '2024-01-15 11:45:00',
                        'buyer_email' => 'buyer2@example.com',
                    ],
                ],
            ],
        ];
        $response = StatsSalesResponse::fromArray($data);

        $this->assertInstanceOf(StatsSalesResponse::class, $response);
        $sales = $response->sales;
        $this->assertCount(2, $sales);
        $this->assertNotEmpty($sales);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'sales' => [
                        [
                            'sale_id' => 'SALE999',
                            'amount' => 299.00,
                            'product_id' => '500',
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = StatsSalesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(StatsSalesResponse::class, $response);
        $this->assertCount(1, $response->sales);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = StatsSalesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
