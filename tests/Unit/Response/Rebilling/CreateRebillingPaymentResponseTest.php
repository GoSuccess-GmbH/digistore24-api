<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Rebilling;

use GoSuccess\Digistore24\Api\Response\Rebilling\CreateRebillingPaymentResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreateRebillingPaymentResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = CreateRebillingPaymentResponse::fromArray($data);
        
        $this->assertInstanceOf(CreateRebillingPaymentResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = CreateRebillingPaymentResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreateRebillingPaymentResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreateRebillingPaymentResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

