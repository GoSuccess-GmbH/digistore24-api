<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ConversionTool;

use GoSuccess\Digistore24\Api\Request\ConversionTool\ValidateCouponCodeRequest;
use PHPUnit\Framework\TestCase;

final class ValidateCouponCodeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ValidateCouponCodeRequest();
        $this->assertInstanceOf(ValidateCouponCodeRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ValidateCouponCodeRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ValidateCouponCodeRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ValidateCouponCodeRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

