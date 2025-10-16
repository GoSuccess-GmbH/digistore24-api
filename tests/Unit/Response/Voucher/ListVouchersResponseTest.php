<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Voucher;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Voucher\ListVouchersResponse;
use PHPUnit\Framework\TestCase;

final class ListVouchersResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'vouchers' => [
                    [
                        'voucher_id' => 'VOU001',
                        'code' => 'SUMMER2024',
                        'discount_type' => 'percentage',
                        'discount_amount' => 20.0,
                    ],
                    [
                        'voucher_id' => 'VOU002',
                        'code' => 'WINTER2024',
                        'discount_type' => 'fixed',
                        'discount_amount' => 10.0,
                    ],
                ],
            ],
        ];
        $response = ListVouchersResponse::fromArray($data);

        $this->assertInstanceOf(ListVouchersResponse::class, $response);
        $vouchers = $response->getVouchers();
        $this->assertCount(2, $vouchers);
        $this->assertNotEmpty($vouchers);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'vouchers' => [
                        [
                            'voucher_id' => 'VOU999',
                            'code' => 'SPRING2024',
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListVouchersResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListVouchersResponse::class, $response);
        $this->assertCount(1, $response->getVouchers());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['vouchers' => []]],
            headers: [],
            rawBody: 'test',
        );

        $response = ListVouchersResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
