<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\SetReferringAffiliateResponse;
use PHPUnit\Framework\TestCase;

final class SetReferringAffiliateResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'email' => 'customer@example.com',
                'affiliate_id' => 789,
                'affiliate_code' => 'AFFILIATE123',
                'set_at' => '2025-10-15 14:30:00',
            ],
        ];

        $response = SetReferringAffiliateResponse::fromArray(data: $data);

        $this->assertInstanceOf(SetReferringAffiliateResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('customer@example.com', $response->email);
        $this->assertSame(789, $response->affiliateId);
        $this->assertSame('AFFILIATE123', $response->affiliateCode);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->setAt);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'email' => 'test@example.com',
                    'affiliate_id' => 456,
                    'set_at' => '2025-10-15 14:30:00',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = SetReferringAffiliateResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(SetReferringAffiliateResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('test@example.com', $response->email);
        $this->assertSame(456, $response->affiliateId);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => ['email' => 'test@example.com'],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = SetReferringAffiliateResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
