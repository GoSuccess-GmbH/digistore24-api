<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Response\BuyUrl\CreateBuyUrlResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreateBuyUrlResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = CreateBuyUrlResponse::fromArray($data);
        
        $this->assertInstanceOf(CreateBuyUrlResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = CreateBuyUrlResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreateBuyUrlResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreateBuyUrlResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

