<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Rebilling;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Rebilling\CreateRebillingPaymentResponse;
use PHPUnit\Framework\TestCase;

final class CreateRebillingPaymentResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'payment_id' => 'PAY123456',
                'amount' => 29.99,
                'currency' => 'EUR',
                'status' => 'completed',
            ],
        ];
        $response = CreateRebillingPaymentResponse::fromArray($data);

        $this->assertInstanceOf(CreateRebillingPaymentResponse::class, $response);
        $this->assertSame('success', $response->getResult());
        $this->assertTrue($response->wasSuccessful());
        $this->assertIsArray($response->getData());
        $this->assertSame('PAY123456', $response->getData()['payment_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'payment_id' => 'PAY999',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = CreateRebillingPaymentResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(CreateRebillingPaymentResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = CreateRebillingPaymentResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
