<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Voucher;

use GoSuccess\Digistore24\Api\Response\Voucher\GetVoucherResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetVoucherResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'voucher_id' => 'VOU123',
                'code' => 'SUMMER2024',
                'discount_type' => 'percentage',
                'discount_amount' => 20.0,
                'valid_from' => '2024-06-01',
                'valid_until' => '2024-08-31',
                'max_uses' => 100,
                'used_count' => 45,
            ],
        ];
        $response = GetVoucherResponse::fromArray($data);
        
        $this->assertInstanceOf(GetVoucherResponse::class, $response);
        $voucherData = $response->getData();
        $this->assertSame('VOU123', $voucherData['voucher_id']);
        $this->assertSame('SUMMER2024', $response->getCode());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'voucher_id' => 'VOU999',
                    'code' => 'WINTER2024',
                    'discount_type' => 'fixed',
                    'discount_amount' => 10.0,
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetVoucherResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetVoucherResponse::class, $response);
        $this->assertSame('WINTER2024', $response->getCode());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetVoucherResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

