<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Billing;

use GoSuccess\Digistore24\Api\Response\Billing\RefundPartiallyResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class RefundPartiallyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = RefundPartiallyResponse::fromArray($data);
        
        $this->assertInstanceOf(RefundPartiallyResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = RefundPartiallyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(RefundPartiallyResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = RefundPartiallyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

