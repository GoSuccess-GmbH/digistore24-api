<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\System;

use GoSuccess\Digistore24\Api\Response\System\GetGlobalSettingsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetGlobalSettingsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'image_metas' => [
                'product_image' => [
                    'label' => 'Product Image',
                    'limits' => [
                        'max_file_size_kb' => 2048,
                        'min_width' => 200,
                        'max_width' => 1920,
                        'min_height' => 200,
                        'max_height' => 1080,
                    ],
                    'limits_msg' => 'Max 2MB, 200x200 to 1920x1080 pixels',
                ],
            ],
            'types' => [
                'product_type' => [
                    'digital' => 'Digital Product',
                    'physical' => 'Physical Product',
                ],
            ],
        ];
        $response = GetGlobalSettingsResponse::fromArray($data);
        
        $this->assertInstanceOf(GetGlobalSettingsResponse::class, $response);
        $this->assertIsArray($response->getImageMetas());
        $this->assertIsArray($response->getTypes());
        $this->assertArrayHasKey('product_image', $response->getImageMetas());
        $this->assertSame('Product Image', $response->getImageMetaForType('product_image')['label']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'image_metas' => [
                    'banner' => [
                        'label' => 'Banner Image',
                        'limits' => [
                            'max_file_size_kb' => 1024,
                            'min_width' => 300,
                            'max_width' => 2560,
                            'min_height' => 100,
                            'max_height' => 720,
                        ],
                        'limits_msg' => 'Max 1MB',
                    ],
                ],
                'types' => [],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetGlobalSettingsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetGlobalSettingsResponse::class, $response);
        $this->assertArrayHasKey('banner', $response->getImageMetas());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'image_metas' => [],
                'types' => [],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetGlobalSettingsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

