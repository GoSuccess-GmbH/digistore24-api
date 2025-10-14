<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Image;

use GoSuccess\Digistore24\Api\Response\Image\ListImagesResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListImagesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = ListImagesResponse::fromArray($data);
        
        $this->assertInstanceOf(ListImagesResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = ListImagesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListImagesResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListImagesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

