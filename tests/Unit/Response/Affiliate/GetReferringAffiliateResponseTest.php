<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\GetReferringAffiliateResponse;
use PHPUnit\Framework\TestCase;

final class GetReferringAffiliateResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'affiliate_id' => 789,
                'affiliate_code' => 'AFFILIATE123',
                'affiliate_email' => 'affiliate@example.com',
                'affiliate_name' => 'John Doe',
                'referral_date' => '2025-10-15 10:30:00',
                'commission_earned' => 50.00,
            ],
        ];

        $response = GetReferringAffiliateResponse::fromArray(data: $data);

        $this->assertInstanceOf(GetReferringAffiliateResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame(789, $response->affiliateId);
        $this->assertSame('AFFILIATE123', $response->affiliateCode);
        $this->assertSame('affiliate@example.com', $response->affiliateEmail);
        $this->assertSame('John Doe', $response->affiliateName);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->referralDate);
        $this->assertSame(50.00, $response->commissionEarned);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'affiliate_id' => 456,
                    'affiliate_code' => 'REF456',
                    'affiliate_name' => 'Jane Smith',
                    'commission_earned' => 25.50,
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = GetReferringAffiliateResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(GetReferringAffiliateResponse::class, $response);
        $this->assertSame(456, $response->affiliateId);
        $this->assertSame('REF456', $response->affiliateCode);
        $this->assertSame(25.50, $response->commissionEarned);
    }

    public function test_handles_no_affiliate(): void
    {
        $data = [
            'result' => 'success',
            'data' => [],
        ];

        $response = GetReferringAffiliateResponse::fromArray(data: $data);

        $this->assertInstanceOf(GetReferringAffiliateResponse::class, $response);
        $this->assertNull($response->affiliateId);
        $this->assertNull($response->affiliateCode);
        $this->assertNull($response->affiliateEmail);
        $this->assertNull($response->affiliateName);
        $this->assertNull($response->referralDate);
        $this->assertNull($response->commissionEarned);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => ['affiliate_id' => 123],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = GetReferringAffiliateResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
