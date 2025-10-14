<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Voucher;

use GoSuccess\Digistore24\Api\Request\Voucher\GetVoucherRequest;
use PHPUnit\Framework\TestCase;

final class GetVoucherRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetVoucherRequest();
        $this->assertInstanceOf(GetVoucherRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetVoucherRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetVoucherRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetVoucherRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

