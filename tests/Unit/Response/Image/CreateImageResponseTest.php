<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Image;

use GoSuccess\Digistore24\Api\Response\Image\CreateImageResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreateImageResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'image_id' => 'IMG123',
            'image_url' => 'https://example.com/images/123.jpg'
        ];
        $response = CreateImageResponse::fromArray($data);
        
        $this->assertInstanceOf(CreateImageResponse::class, $response);
        $this->assertSame('IMG123', $response->imageId);
        $this->assertSame('https://example.com/images/123.jpg', $response->imageUrl);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'image_id' => 'IMG456',
                'image_url' => 'https://example.com/images/456.jpg'
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = CreateImageResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreateImageResponse::class, $response);
        $this->assertSame('IMG456', $response->imageId);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreateImageResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

