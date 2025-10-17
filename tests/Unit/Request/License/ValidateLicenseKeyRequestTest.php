<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\License;

use GoSuccess\Digistore24\Api\Request\License\ValidateLicenseKeyRequest;
use PHPUnit\Framework\TestCase;

final class ValidateLicenseKeyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ValidateLicenseKeyRequest(
            purchaseId: 'P12345',
            licenseKey: 'LIC-ABC-123-XYZ',
        );

        $this->assertInstanceOf(ValidateLicenseKeyRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ValidateLicenseKeyRequest(
            purchaseId: 'P12345',
            licenseKey: 'LIC-ABC-123-XYZ',
        );

        $this->assertSame('/validateLicenseKey', $request->getEndpoint());
    }

    public function test_to_array_includes_all_data(): void
    {
        $request = new ValidateLicenseKeyRequest(
            purchaseId: 'P12345',
            licenseKey: 'LIC-ABC-123-XYZ',
        );

        $array = $request->toArray();
        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertSame('LIC-ABC-123-XYZ', $array['license_key']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ValidateLicenseKeyRequest(
            purchaseId: 'P12345',
            licenseKey: 'LIC-ABC-123-XYZ',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
