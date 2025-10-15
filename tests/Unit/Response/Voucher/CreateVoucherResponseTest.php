<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Voucher;

use GoSuccess\Digistore24\Api\Response\Voucher\CreateVoucherResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreateVoucherResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'voucher_id' => 'VOU123',
                'code' => 'SUMMER2024',
                'discount_type' => 'percentage',
                'discount_amount' => 20.0,
            ],
        ];
        $response = CreateVoucherResponse::fromArray($data);
        
        $this->assertInstanceOf(CreateVoucherResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertSame('VOU123', $response->getVoucherId());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'voucher_id' => 'VOU999',
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = CreateVoucherResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreateVoucherResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success', 'data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreateVoucherResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

