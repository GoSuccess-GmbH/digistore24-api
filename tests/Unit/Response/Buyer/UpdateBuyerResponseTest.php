<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Buyer;

use GoSuccess\Digistore24\Api\Response\Buyer\UpdateBuyerResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class UpdateBuyerResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = UpdateBuyerResponse::fromArray($data);
        
        $this->assertInstanceOf(UpdateBuyerResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = UpdateBuyerResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(UpdateBuyerResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = UpdateBuyerResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

