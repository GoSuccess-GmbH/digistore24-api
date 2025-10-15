<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\License;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\License\ValidateLicenseKeyResponse;
use PHPUnit\Framework\TestCase;

final class ValidateLicenseKeyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'is_license_valid' => 'Y',
                'is_license_key_found' => 'Y',
                'purchase_id' => 'P123456',
                'license_key' => 'LIC-KEY-12345',
                'product_id' => 789,
                'product_name' => 'Premium Software',
                'billing_tatus' => 'active',
                'billing_tatus_msg' => 'License is active',
                'last_payment_at' => '2024-01-15',
                'next_payment_at' => '2025-01-15',
                'paid_until' => '2025-01-15',
            ],
        ];
        $response = ValidateLicenseKeyResponse::fromArray($data);

        $this->assertInstanceOf(ValidateLicenseKeyResponse::class, $response);
        $this->assertTrue($response->isValid());
        $this->assertTrue($response->isFound());
        $this->assertSame('P123456', $response->getPurchaseId());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'is_license_valid' => 'Y',
                    'is_license_key_found' => 'Y',
                    'purchase_id' => 'P789012',
                    'license_key' => 'LIC-KEY-67890',
                    'product_id' => 456,
                    'product_name' => 'Basic Software',
                    'billing_tatus' => 'active',
                    'billing_tatus_msg' => 'Active subscription',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ValidateLicenseKeyResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ValidateLicenseKeyResponse::class, $response);
        $this->assertSame('Basic Software', $response->getProductName());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ValidateLicenseKeyResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
