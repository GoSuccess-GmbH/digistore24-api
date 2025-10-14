<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Response\BuyUrl\DeleteBuyUrlResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class DeleteBuyUrlResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = DeleteBuyUrlResponse::fromArray($data);
        
        $this->assertInstanceOf(DeleteBuyUrlResponse::class, $response);
        $this->assertTrue($response->success);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: ''
        );
        
        $response = DeleteBuyUrlResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(DeleteBuyUrlResponse::class, $response);
        $this->assertTrue($response->success);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = DeleteBuyUrlResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

