<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\PaymentPlan;

use GoSuccess\Digistore24\Api\Response\PaymentPlan\UpdatePaymentplanResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class UpdatePaymentplanResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success'
        ];
        $response = UpdatePaymentplanResponse::fromArray($data);
        
        $this->assertInstanceOf(UpdatePaymentplanResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertSame('success', $response->getResult());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success'
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = UpdatePaymentplanResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(UpdatePaymentplanResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = UpdatePaymentplanResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

