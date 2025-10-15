<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Voucher;

use GoSuccess\Digistore24\Api\Request\Voucher\UpdateVoucherRequest;
use PHPUnit\Framework\TestCase;

final class UpdateVoucherRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateVoucherRequest(code: 'SAVE20', data: ['discount' => 25]);
        
        $this->assertInstanceOf(UpdateVoucherRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UpdateVoucherRequest(code: 'SAVE20', data: ['discount' => 25]);
        
        $this->assertSame('/updateVoucher', $request->getEndpoint());
    }

    public function test_to_array_includes_code_and_data(): void
    {
        $request = new UpdateVoucherRequest(code: 'SAVE20', data: ['discount' => 25]);
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('SAVE20', $array['code']);
        $this->assertSame(25, $array['discount']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UpdateVoucherRequest(code: 'SAVE20', data: ['discount' => 25]);
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

