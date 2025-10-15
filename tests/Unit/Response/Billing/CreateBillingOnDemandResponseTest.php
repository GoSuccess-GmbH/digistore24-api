<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Billing;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Billing\CreateBillingOnDemandResponse;
use PHPUnit\Framework\TestCase;

final class CreateBillingOnDemandResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'created_purchase_id' => 'P123456',
            'payment_status' => 'paid',
            'payment_status_msg' => 'Payment successful',
            'billing_status' => 'completed',
            'billing_status_msg' => 'Billing completed',
        ];
        $response = CreateBillingOnDemandResponse::fromArray($data);

        $this->assertInstanceOf(CreateBillingOnDemandResponse::class, $response);
        $this->assertSame('P123456', $response->getCreatedPurchaseId());
        $this->assertSame('paid', $response->getPaymentStatus());
        $this->assertSame('completed', $response->getBillingStatus());
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'created_purchase_id' => 'P123456',
                'payment_status' => 'paid',
                'payment_status_msg' => 'Payment successful',
                'billing_status' => 'completed',
                'billing_status_msg' => 'Billing completed',
            ],
            headers: [],
            rawBody: '',
        );

        $response = CreateBillingOnDemandResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(CreateBillingOnDemandResponse::class, $response);
        $this->assertSame('P123456', $response->getCreatedPurchaseId());
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'created_purchase_id' => 'P123456',
                'payment_status' => 'paid',
                'payment_status_msg' => 'Payment successful',
                'billing_status' => 'completed',
                'billing_status_msg' => 'Billing completed',
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = CreateBillingOnDemandResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
