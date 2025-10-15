<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Product;

use GoSuccess\Digistore24\Api\Response\Product\ListProductsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListProductsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'products' => [
                [
                    'product_id' => '101',
                    'product_name' => 'Product A',
                    'product_type' => 'digital',
                    'price' => 29.99,
                    'currency' => 'EUR',
                    'is_published' => true,
                    'created_at' => '2024-01-15'
                ],
                [
                    'product_id' => '102',
                    'product_name' => 'Product B',
                    'product_type' => 'physical',
                    'price' => 59.99,
                    'currency' => 'EUR',
                    'is_published' => false,
                    'created_at' => '2024-02-01'
                ]
            ],
            'total_count' => 2
        ];
        $response = ListProductsResponse::fromArray($data);
        
        $this->assertInstanceOf(ListProductsResponse::class, $response);
        $this->assertCount(2, $response->products);
        $this->assertSame(2, $response->totalCount);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'products' => [
                    [
                        'product_id' => '201',
                        'product_name' => 'Product C',
                        'product_type' => 'service',
                        'price' => 99.99,
                        'currency' => 'USD',
                        'is_published' => true
                    ]
                ],
                'total_count' => 1
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ListProductsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListProductsResponse::class, $response);
        $this->assertCount(1, $response->products);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListProductsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

