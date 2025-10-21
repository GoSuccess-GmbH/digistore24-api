<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\UpdateAffiliateCommissionResponse;
use PHPUnit\Framework\TestCase;

final class UpdateAffiliateCommissionResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'product_id' => 12345,
                'commission_rate' => 60.0,
                'first_level_commission' => 60.0,
                'second_level_commission' => 15.0,
                'is_affiliate_enabled' => true,
                'updated_at' => '2025-10-15 14:30:00',
            ],
        ];

        $response = UpdateAffiliateCommissionResponse::fromArray(data: $data);

        $this->assertInstanceOf(UpdateAffiliateCommissionResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame(12345, $response->productId);
        $this->assertSame(60.0, $response->commissionRate);
        $this->assertSame(60.0, $response->firstLevelCommission);
        $this->assertSame(15.0, $response->secondLevelCommission);
        $this->assertTrue($response->isAffiliateEnabled);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->updatedAt);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'product_id' => 67890,
                    'commission_rate' => 50.0,
                    'is_affiliate_enabled' => false,
                    'updated_at' => '2025-10-15 14:30:00',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = UpdateAffiliateCommissionResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(UpdateAffiliateCommissionResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame(67890, $response->productId);
        $this->assertSame(50.0, $response->commissionRate);
        $this->assertFalse($response->isAffiliateEnabled);
    }

    public function test_handles_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'product_id' => 111,
                'is_affiliate_enabled' => true,
            ],
        ];

        $response = UpdateAffiliateCommissionResponse::fromArray(data: $data);

        $this->assertInstanceOf(UpdateAffiliateCommissionResponse::class, $response);
        $this->assertSame(111, $response->productId);
        $this->assertTrue($response->isAffiliateEnabled);
        $this->assertNull($response->commissionRate);
        $this->assertNull($response->firstLevelCommission);
        $this->assertNull($response->secondLevelCommission);
        $this->assertNull($response->updatedAt);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => ['product_id' => 123, 'is_affiliate_enabled' => true],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = UpdateAffiliateCommissionResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
