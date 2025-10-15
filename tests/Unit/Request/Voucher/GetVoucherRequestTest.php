<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Voucher;

use GoSuccess\Digistore24\Api\Request\Voucher\GetVoucherRequest;
use PHPUnit\Framework\TestCase;

final class GetVoucherRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetVoucherRequest(code: 'SAVE20');

        $this->assertInstanceOf(GetVoucherRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetVoucherRequest(code: 'SAVE20');

        $this->assertSame('/getVoucher', $request->getEndpoint());
    }

    public function test_to_array_includes_code(): void
    {
        $request = new GetVoucherRequest(code: 'SAVE20');

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('SAVE20', $array['code']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetVoucherRequest(code: 'SAVE20');

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
