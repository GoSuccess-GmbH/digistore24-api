<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Voucher;

use GoSuccess\Digistore24\Api\Request\Voucher\CreateVoucherRequest;
use PHPUnit\Framework\TestCase;

final class CreateVoucherRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateVoucherRequest(data: ['code' => 'SAVE20', 'discount' => 20]);
        
        $this->assertInstanceOf(CreateVoucherRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateVoucherRequest(data: ['code' => 'SAVE20', 'discount' => 20]);
        
        $this->assertSame('/createVoucher', $request->getEndpoint());
    }

    public function test_to_array_includes_data(): void
    {
        $request = new CreateVoucherRequest(data: ['code' => 'SAVE20', 'discount' => 20]);
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('SAVE20', $array['code']);
        $this->assertSame(20, $array['discount']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreateVoucherRequest(data: ['code' => 'SAVE20', 'discount' => 20]);
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

