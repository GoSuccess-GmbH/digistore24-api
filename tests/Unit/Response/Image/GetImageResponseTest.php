<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Image;

use GoSuccess\Digistore24\Api\Response\Image\GetImageResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetImageResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'image_id' => 'IMG123',
            'image_url' => 'https://example.com/images/123.jpg',
            'name' => 'Product Image',
            'usage_type' => 'product',
            'alt_tag' => 'Product photo',
            'created_at' => '2024-01-15'
        ];
        $response = GetImageResponse::fromArray($data);
        
        $this->assertInstanceOf(GetImageResponse::class, $response);
        $this->assertSame('IMG123', $response->imageId);
        $this->assertSame('Product Image', $response->name);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'image_id' => 'IMG456',
                'image_url' => 'https://example.com/images/456.jpg',
                'name' => 'Banner',
                'created_at' => '2024-02-01'
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetImageResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetImageResponse::class, $response);
        $this->assertSame('Banner', $response->name);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetImageResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

