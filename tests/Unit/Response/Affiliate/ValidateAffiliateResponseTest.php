<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\ValidateAffiliateResponse;
use PHPUnit\Framework\TestCase;

final class ValidateAffiliateResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'valid' => true,
                'affiliate_id' => 789,
                'affiliate_code' => 'AFFILIATE123',
                'is_active' => true,
                'email' => 'affiliate@example.com',
                'name' => 'John Doe',
            ],
        ];

        $response = ValidateAffiliateResponse::fromArray(data: $data);

        $this->assertInstanceOf(ValidateAffiliateResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->valid);
        $this->assertSame(789, $response->affiliateId);
        $this->assertSame('AFFILIATE123', $response->affiliateCode);
        $this->assertTrue($response->isActive);
        $this->assertSame('affiliate@example.com', $response->email);
        $this->assertSame('John Doe', $response->name);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'valid' => true,
                    'affiliate_id' => 456,
                    'affiliate_code' => 'AFF456',
                    'is_active' => false,
                    'email' => 'test@example.com',
                    'name' => 'Jane Smith',
                ],
            ],
            headers: [],
            rawBody: '{"result":"success"}',
        );

        $response = ValidateAffiliateResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(ValidateAffiliateResponse::class, $response);
        $this->assertTrue($response->valid);
        $this->assertSame(456, $response->affiliateId);
        $this->assertFalse($response->isActive);
        $this->assertSame('Jane Smith', $response->name);
    }

    public function test_handles_invalid_affiliate(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'valid' => false,
            ],
        ];

        $response = ValidateAffiliateResponse::fromArray(data: $data);

        $this->assertInstanceOf(ValidateAffiliateResponse::class, $response);
        $this->assertFalse($response->valid);
        $this->assertFalse($response->isActive);
        $this->assertNull($response->affiliateId);
        $this->assertNull($response->affiliateCode);
        $this->assertNull($response->email);
        $this->assertNull($response->name);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => ['valid' => true, 'affiliate_id' => 123],
            ],
            headers: ['Content-Type' => 'application/json'],
            rawBody: 'test body',
        );

        $response = ValidateAffiliateResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
