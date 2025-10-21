<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Transaction;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Transaction\RefundTransactionResponse;
use PHPUnit\Framework\TestCase;

final class RefundTransactionResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'status' => 'completed',
                'modified' => 'Y',
                'transaction_id' => 'TXN123456',
                'refund_amount' => 99.99,
                'refund_date' => '2024-01-15',
            ],
        ];
        $response = RefundTransactionResponse::fromArray($data);

        $this->assertInstanceOf(RefundTransactionResponse::class, $response);
        $this->assertSame('completed', $response->status);
        $this->assertSame('Y', $response->modified);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'status' => 'completed',
                    'modified' => 'Y',
                    'refund_amount' => 49.50,
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = RefundTransactionResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(RefundTransactionResponse::class, $response);
        $this->assertSame('Y', $response->modified);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'status' => 'completed',
                    'modified' => 'Y',
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = RefundTransactionResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
