<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Response\Purchase\UpdatePurchaseResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class UpdatePurchaseResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = UpdatePurchaseResponse::fromArray($data);
        
        $this->assertInstanceOf(UpdatePurchaseResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = UpdatePurchaseResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(UpdatePurchaseResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = UpdatePurchaseResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

