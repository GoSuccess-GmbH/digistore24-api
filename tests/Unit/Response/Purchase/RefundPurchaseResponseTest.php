<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Response\Purchase\RefundPurchaseResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class RefundPurchaseResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = RefundPurchaseResponse::fromArray($data);
        
        $this->assertInstanceOf(RefundPurchaseResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = RefundPurchaseResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(RefundPurchaseResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = RefundPurchaseResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

