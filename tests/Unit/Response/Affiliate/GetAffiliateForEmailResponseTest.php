<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\GetAffiliateForEmailResponse;
use PHPUnit\Framework\TestCase;

final class GetAffiliateForEmailResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'affiliate_id' => 789,
                'email' => 'affiliate@example.com',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'affiliate_code' => 'AFFILIATE123',
                'is_active' => true,
                'commission_balance' => 1250.50,
                'total_sales' => 5000.00,
                'created_at' => '2024-01-15 10:30:00',
            ],
        ];

        $response = GetAffiliateForEmailResponse::fromArray(data: $data);

        $this->assertInstanceOf(GetAffiliateForEmailResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame(789, $response->affiliateId);
        $this->assertSame('affiliate@example.com', $response->email);
        $this->assertSame('John', $response->firstName);
        $this->assertSame('Doe', $response->lastName);
        $this->assertSame('AFFILIATE123', $response->affiliateCode);
        $this->assertTrue($response->isActive);
        $this->assertSame(1250.50, $response->commissionBalance);
        $this->assertSame(5000.00, $response->totalSales);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->createdAt);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'affiliate_id' => 456,
                    'email' => 'test@example.com',
                    'first_name' => 'Jane',
                    'last_name' => 'Smith',
                    'is_active' => false,
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = GetAffiliateForEmailResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(GetAffiliateForEmailResponse::class, $response);
        $this->assertSame(456, $response->affiliateId);
        $this->assertSame('test@example.com', $response->email);
        $this->assertFalse($response->isActive);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => ['affiliate_id' => 123, 'email' => 'test@test.com'],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = GetAffiliateForEmailResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
