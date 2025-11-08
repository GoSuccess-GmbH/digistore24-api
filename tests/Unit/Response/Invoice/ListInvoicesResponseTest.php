<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Invoice;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Invoice\ListInvoicesResponse;
use PHPUnit\Framework\TestCase;

final class ListInvoicesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'purchase_id' => 'P123456',
                'invoice_list' => [
                    [
                        'invoice_id' => 'INV001',
                        'invoice_date' => '2024-01-15',
                        'amount' => 99.99,
                    ],
                    [
                        'invoice_id' => 'INV002',
                        'invoice_date' => '2024-02-15',
                        'amount' => 49.99,
                    ],
                ],
            ],
        ];
        $response = ListInvoicesResponse::fromArray($data);

        $this->assertInstanceOf(ListInvoicesResponse::class, $response);
        $this->assertSame('P123456', $response->purchaseId);
        $this->assertCount(2, $response->invoiceList);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'purchase_id' => 'P789012',
                    'invoice_list' => [
                        [
                            'invoice_id' => 'INV003',
                            'amount' => 149.99,
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListInvoicesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListInvoicesResponse::class, $response);
        $this->assertSame('P789012', $response->purchaseId);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListInvoicesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
