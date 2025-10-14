<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\PaymentPlan;

use GoSuccess\Digistore24\Api\Response\PaymentPlan\CreatePaymentplanResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreatePaymentplanResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = CreatePaymentplanResponse::fromArray($data);
        
        $this->assertInstanceOf(CreatePaymentplanResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = CreatePaymentplanResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreatePaymentplanResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreatePaymentplanResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

