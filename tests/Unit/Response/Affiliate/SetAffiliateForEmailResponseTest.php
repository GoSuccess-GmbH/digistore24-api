<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\SetAffiliateForEmailResponse;
use PHPUnit\Framework\TestCase;

final class SetAffiliateForEmailResponseTest extends TestCase
{
    public function test_can_create_from_array_with_comprehensive_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'affiliate_id' => 12345,
                'email' => 'affiliate@example.com',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'affiliate_code' => 'JOHNDOE123',
                'is_active' => true,
                'created_at' => '2024-01-15T10:30:00Z',
            ],
        ];

        $response = SetAffiliateForEmailResponse::fromArray($data);

        $this->assertInstanceOf(SetAffiliateForEmailResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame(12345, $response->affiliateId);
        $this->assertSame('affiliate@example.com', $response->email);
        $this->assertSame('John', $response->firstName);
        $this->assertSame('Doe', $response->lastName);
        $this->assertSame('JOHNDOE123', $response->affiliateCode);
        $this->assertTrue($response->isActive);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->createdAt);
    }

    public function test_can_create_from_array_with_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'affiliate_id' => 67890,
                'email' => 'minimal@example.com',
                'is_active' => false,
            ],
        ];

        $response = SetAffiliateForEmailResponse::fromArray($data);

        $this->assertInstanceOf(SetAffiliateForEmailResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame(67890, $response->affiliateId);
        $this->assertSame('minimal@example.com', $response->email);
        $this->assertNull($response->firstName);
        $this->assertNull($response->lastName);
        $this->assertNull($response->affiliateCode);
        $this->assertFalse($response->isActive);
        $this->assertNull($response->createdAt);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'affiliate_id' => 12345,
                    'email' => 'test@example.com',
                    'is_active' => true,
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = SetAffiliateForEmailResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(12345, $response->affiliateId);
        $this->assertSame('test@example.com', $response->email);
    }
}
