<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Product;

use GoSuccess\Digistore24\Api\Response\Product\DeleteProductResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class DeleteProductResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = DeleteProductResponse::fromArray($data);
        
        $this->assertInstanceOf(DeleteProductResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = DeleteProductResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(DeleteProductResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = DeleteProductResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

