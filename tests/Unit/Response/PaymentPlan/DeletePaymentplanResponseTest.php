<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\PaymentPlan;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\PaymentPlan\DeletePaymentplanResponse;
use PHPUnit\Framework\TestCase;

final class DeletePaymentplanResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
        ];
        $response = DeletePaymentplanResponse::fromArray($data);

        $this->assertInstanceOf(DeletePaymentplanResponse::class, $response);
        $this->assertSame('success', $response->result);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
            ],
            headers: [],
            rawBody: '',
        );

        $response = DeletePaymentplanResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(DeletePaymentplanResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = DeletePaymentplanResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
