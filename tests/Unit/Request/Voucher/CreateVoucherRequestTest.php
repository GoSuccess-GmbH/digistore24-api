<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Voucher;

use GoSuccess\Digistore24\Api\Request\Voucher\CreateVoucherRequest;
use PHPUnit\Framework\TestCase;

final class CreateVoucherRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateVoucherRequest();
        $this->assertInstanceOf(CreateVoucherRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreateVoucherRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreateVoucherRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreateVoucherRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

