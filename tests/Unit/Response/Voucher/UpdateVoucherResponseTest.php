<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Voucher;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Voucher\UpdateVoucherResponse;
use PHPUnit\Framework\TestCase;

final class UpdateVoucherResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'discount_code_id' => 12345,
                'code' => 'SUMMER2024',
                'modified' => 'Y',
            ],
        ];

        $response = UpdateVoucherResponse::fromArray(data: $data);

        $this->assertInstanceOf(UpdateVoucherResponse::class, $response);
        $this->assertSame(12345, $response->discountCodeId);
        $this->assertSame('SUMMER2024', $response->code);
        $this->assertTrue($response->isModified);
    }

    public function test_not_modified_response(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'discount_code_id' => 67890,
                'code' => 'WINTER2024',
                'modified' => 'N',
            ],
        ];

        $response = UpdateVoucherResponse::fromArray(data: $data);

        $this->assertInstanceOf(UpdateVoucherResponse::class, $response);
        $this->assertSame(67890, $response->discountCodeId);
        $this->assertSame('WINTER2024', $response->code);
        $this->assertFalse($response->isModified);
    }

    public function test_can_create_with_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [],
        ];

        $response = UpdateVoucherResponse::fromArray(data: $data);

        $this->assertInstanceOf(UpdateVoucherResponse::class, $response);
        $this->assertSame(0, $response->discountCodeId);
        $this->assertSame('', $response->code);
        $this->assertFalse($response->isModified);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'discount_code_id' => 99999,
                    'code' => 'SPRING2024',
                    'modified' => 'Y',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = UpdateVoucherResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(UpdateVoucherResponse::class, $response);
        $this->assertSame(99999, $response->discountCodeId);
        $this->assertSame('SPRING2024', $response->code);
        $this->assertTrue($response->isModified);
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
                    'modified' => 'N',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = UpdateVoucherResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
