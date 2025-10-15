<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Product;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Product\GetProductResponse;
use PHPUnit\Framework\TestCase;

final class GetProductResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'product_id' => '123',
            'product_name' => 'Premium Course',
            'product_type' => 'digital',
            'price' => 99.99,
            'currency' => 'EUR',
            'description' => 'Advanced training',
            'is_published' => true,
            'image_url' => 'https://example.com/image.jpg',
            'additional_data' => ['category' => 'education'],
        ];
        $response = GetProductResponse::fromArray($data);

        $this->assertInstanceOf(GetProductResponse::class, $response);
        $this->assertSame('Premium Course', $response->productName);
        $this->assertSame(99.99, $response->price);
        $this->assertTrue($response->isPublished);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'product_id' => '456',
                'product_name' => 'Basic Package',
                'product_type' => 'membership',
                'price' => 49.99,
                'currency' => 'USD',
                'is_published' => false,
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetProductResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetProductResponse::class, $response);
        $this->assertSame('Basic Package', $response->productName);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = GetProductResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
