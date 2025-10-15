<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\PaymentPlan;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\PaymentPlan\CreatePaymentplanResponse;
use PHPUnit\Framework\TestCase;

final class CreatePaymentplanResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'paymentplan_id' => 'PP123456',
            ],
        ];
        $response = CreatePaymentplanResponse::fromArray($data);

        $this->assertInstanceOf(CreatePaymentplanResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertSame('PP123456', $response->getPaymentplanId());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'paymentplan_id' => 'PP789012',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = CreatePaymentplanResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(CreatePaymentplanResponse::class, $response);
        $this->assertSame('PP789012', $response->getPaymentplanId());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = CreatePaymentplanResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
