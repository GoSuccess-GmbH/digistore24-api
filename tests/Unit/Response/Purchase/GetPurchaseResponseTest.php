<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Purchase\GetPurchaseResponse;
use PHPUnit\Framework\TestCase;

final class GetPurchaseResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'purchase_id' => 'P123456',
            'product_id' => '789',
            'product_name' => 'Premium Course',
            'buyer_email' => 'buyer@example.com',
            'payment_status' => 'paid',
            'billing_status' => 'active',
            'amount' => 99.99,
            'currency' => 'EUR',
            'created_at' => '2024-01-15 10:30:00',
            'additional_data' => ['key' => 'value'],
        ];
        $response = GetPurchaseResponse::fromArray($data);

        $this->assertInstanceOf(GetPurchaseResponse::class, $response);
        $this->assertSame('P123456', $response->purchaseId);
        $this->assertSame('789', $response->productId);
        $this->assertSame('Premium Course', $response->productName);
        $this->assertSame('buyer@example.com', $response->buyerEmail);
        $this->assertSame('paid', $response->paymentStatus);
        $this->assertSame('active', $response->billingStatus);
        $this->assertSame(99.99, $response->amount);
        $this->assertSame('EUR', $response->currency);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->createdAt);    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'purchase_id' => 'P654321',
                'product_id' => '456',
                'product_name' => 'Digital Product',
                'buyer_email' => 'customer@test.com',
                'payment_status' => 'pending',
                'billing_status' => 'pending',
                'amount' => 49.50,
                'currency' => 'USD',
                'created_at' => '2024-02-01 14:00:00',
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetPurchaseResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetPurchaseResponse::class, $response);
        $this->assertSame('P654321', $response->purchaseId);
        $this->assertSame('Digital Product', $response->productName);
        $this->assertSame(49.50, $response->amount);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'purchase_id' => 'P999999',
                'product_id' => '111',
                'product_name' => 'Test Product',
                'buyer_email' => 'test@example.com',
                'payment_status' => 'paid',
                'billing_status' => 'active',
                'amount' => 19.99,
                'currency' => 'EUR',
                'created_at' => '2024-01-01 00:00:00',
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetPurchaseResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
