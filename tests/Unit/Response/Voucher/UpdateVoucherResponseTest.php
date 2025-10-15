<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Voucher;

use GoSuccess\Digistore24\Api\Response\Voucher\UpdateVoucherResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class UpdateVoucherResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
        ];
        $response = UpdateVoucherResponse::fromArray($data);
        
        $this->assertInstanceOf(UpdateVoucherResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = UpdateVoucherResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(UpdateVoucherResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success'],
            headers: [],
            rawBody: 'test'
        );
        
        $response = UpdateVoucherResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

