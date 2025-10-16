<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ConversionTool;

use GoSuccess\Digistore24\Api\Request\ConversionTool\ValidateCouponCodeRequest;
use PHPUnit\Framework\TestCase;

final class ValidateCouponCodeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ValidateCouponCodeRequest(code: 'SUMMER2024');

        $this->assertInstanceOf(ValidateCouponCodeRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ValidateCouponCodeRequest(code: 'SUMMER2024');

        $this->assertSame('/validateCouponCode', $request->getEndpoint());
    }

    public function test_to_array_includes_code(): void
    {
        $request = new ValidateCouponCodeRequest(code: 'SUMMER2024');

        $array = $request->toArray();        $this->assertSame('SUMMER2024', $array['code']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ValidateCouponCodeRequest(code: 'SUMMER2024');

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
