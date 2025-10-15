<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Response\Purchase\CreateAddonChangePurchaseResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreateAddonChangePurchaseResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'created_purchase_id' => 'P123456789',
            'payment_status' => 'paid',
            'payment_status_msg' => 'Payment successful',
            'billing_status' => 'active',
            'billing_status_msg' => 'Subscription active',
            'pay_url' => 'https://digistore24.com/pay/P123456789',
        ];
        $response = CreateAddonChangePurchaseResponse::fromArray($data);
        
        $this->assertInstanceOf(CreateAddonChangePurchaseResponse::class, $response);
        $this->assertSame('P123456789', $response->createdPurchaseId);
        $this->assertSame('paid', $response->paymentStatus);
        $this->assertSame('Payment successful', $response->paymentStatusMsg);
        $this->assertSame('active', $response->billingStatus);
        $this->assertSame('Subscription active', $response->billingStatusMsg);
        $this->assertSame('https://digistore24.com/pay/P123456789', $response->payUrl);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'created_purchase_id' => 'P987654321',
                'payment_status' => 'pending',
                'payment_status_msg' => 'Payment pending',
                'billing_status' => 'pending',
                'billing_status_msg' => 'Awaiting payment',
                'pay_url' => null,
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = CreateAddonChangePurchaseResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreateAddonChangePurchaseResponse::class, $response);
        $this->assertSame('P987654321', $response->createdPurchaseId);
        $this->assertSame('pending', $response->paymentStatus);
        $this->assertSame('Payment pending', $response->paymentStatusMsg);
        $this->assertSame('pending', $response->billingStatus);
        $this->assertSame('Awaiting payment', $response->billingStatusMsg);
        $this->assertNull($response->payUrl);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'created_purchase_id' => 'P111222333',
                'payment_status' => 'paid',
                'payment_status_msg' => 'Payment successful',
                'billing_status' => 'active',
                'billing_status_msg' => 'Subscription active',
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreateAddonChangePurchaseResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

