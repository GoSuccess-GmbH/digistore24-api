<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Voucher;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Voucher\CreateVoucherResponse;
use PHPUnit\Framework\TestCase;

final class CreateVoucherResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'discount_code_id' => 12345,
                'code' => 'SUMMER2024',
            ],
        ];

        $response = CreateVoucherResponse::fromArray(data: $data);

        $this->assertInstanceOf(CreateVoucherResponse::class, $response);
        $this->assertSame(12345, $response->discountCodeId);
        $this->assertSame('SUMMER2024', $response->code);
    }

    public function test_can_create_with_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [],
        ];

        $response = CreateVoucherResponse::fromArray(data: $data);

        $this->assertInstanceOf(CreateVoucherResponse::class, $response);
        $this->assertSame(0, $response->discountCodeId);
        $this->assertSame('', $response->code);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'discount_code_id' => 99999,
                    'code' => 'WINTER2024',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = CreateVoucherResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(CreateVoucherResponse::class, $response);
        $this->assertSame(99999, $response->discountCodeId);
        $this->assertSame('WINTER2024', $response->code);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'discount_code_id' => 123,
                    'code' => 'TEST',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = CreateVoucherResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
