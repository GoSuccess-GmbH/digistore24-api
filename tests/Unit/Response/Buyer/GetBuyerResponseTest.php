<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Buyer;

use GoSuccess\Digistore24\Api\Response\Buyer\GetBuyerResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetBuyerResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = GetBuyerResponse::fromArray($data);
        
        $this->assertInstanceOf(GetBuyerResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = GetBuyerResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetBuyerResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetBuyerResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

