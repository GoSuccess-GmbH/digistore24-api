<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Billing;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Billing\CreateBillingOnDemandResponse;
use PHPUnit\Framework\TestCase;

final class CreateBillingOnDemandResponseTest extends TestCase
{
    public function test_can_create_from_array_with_comprehensive_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'created_purchase_id' => 'P123456',
                'payment_status' => 'paid',
                'payment_status_msg' => 'Payment successful',
                'billing_status' => 'completed',
                'billing_status_msg' => 'Billing completed',
            ],
        ];
        $response = CreateBillingOnDemandResponse::fromArray($data);

        $this->assertInstanceOf(CreateBillingOnDemandResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('P123456', $response->createdPurchaseId);
        $this->assertSame('paid', $response->paymentStatus);
        $this->assertSame('Payment successful', $response->paymentStatusMsg);
        $this->assertSame('completed', $response->billingStatus);
        $this->assertSame('Billing completed', $response->billingStatusMsg);
    }

    public function test_can_create_from_array_with_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'created_purchase_id' => 'P789',
                'billing_status' => 'pending',
            ],
        ];

        $response = CreateBillingOnDemandResponse::fromArray($data);

        $this->assertInstanceOf(CreateBillingOnDemandResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('P789', $response->createdPurchaseId);
        $this->assertSame('', $response->paymentStatus);
        $this->assertSame('', $response->paymentStatusMsg);
        $this->assertSame('pending', $response->billingStatus);
        $this->assertSame('', $response->billingStatusMsg);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'created_purchase_id' => 'P123456',
                    'payment_status' => 'paid',
                    'payment_status_msg' => 'Payment successful',
                    'billing_status' => 'completed',
                    'billing_status_msg' => 'Billing completed',
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = CreateBillingOnDemandResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame('P123456', $response->createdPurchaseId);
    }
}
