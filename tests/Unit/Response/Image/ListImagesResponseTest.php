<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Image;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Image\ListImagesResponse;
use PHPUnit\Framework\TestCase;

final class ListImagesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'images' => [
                [
                    'image_id' => 'IMG123',
                    'image_url' => 'https://example.com/images/123.jpg',
                    'name' => 'Product 1',
                    'usage_type' => 'product',
                    'created_at' => '2024-01-15',
                ],
                [
                    'image_id' => 'IMG456',
                    'image_url' => 'https://example.com/images/456.jpg',
                    'name' => 'Banner 2',
                    'usage_type' => 'banner',
                    'created_at' => '2024-02-01',
                ],
            ],
            'total_count' => 2,
        ];
        $response = ListImagesResponse::fromArray($data);

        $this->assertInstanceOf(ListImagesResponse::class, $response);
        $this->assertCount(2, $response->images);
        $this->assertSame(2, $response->totalCount);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'images' => [
                    [
                        'image_id' => 'IMG789',
                        'image_url' => 'https://example.com/images/789.jpg',
                        'name' => 'Logo',
                        'created_at' => '2024-03-01',
                    ],
                ],
                'total_count' => 1,
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListImagesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListImagesResponse::class, $response);
        $this->assertCount(1, $response->images);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListImagesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
