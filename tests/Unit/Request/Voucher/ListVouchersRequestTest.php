<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Voucher;

use GoSuccess\Digistore24\Api\Request\Voucher\ListVouchersRequest;
use PHPUnit\Framework\TestCase;

final class ListVouchersRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListVouchersRequest();
        
        $this->assertInstanceOf(ListVouchersRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListVouchersRequest();
        
        $this->assertSame('/listVouchers', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListVouchersRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListVouchersRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

