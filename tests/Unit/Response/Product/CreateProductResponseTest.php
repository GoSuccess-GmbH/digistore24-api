<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Product;

use GoSuccess\Digistore24\Api\Response\Product\CreateProductResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreateProductResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'product_id' => 123456
            ]
        ];
        $response = CreateProductResponse::fromArray($data);
        
        $this->assertInstanceOf(CreateProductResponse::class, $response);
        $this->assertSame(123456, $response->getProductId());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'product_id' => 789012
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = CreateProductResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreateProductResponse::class, $response);
        $this->assertSame(789012, $response->getProductId());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreateProductResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

