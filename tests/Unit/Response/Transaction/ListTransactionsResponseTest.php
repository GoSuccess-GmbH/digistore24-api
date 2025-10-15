<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Transaction;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Transaction\ListTransactionsResponse;
use PHPUnit\Framework\TestCase;

final class ListTransactionsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'transaction_list' => [
                    [
                        'transaction_id' => 'TXN001',
                        'amount' => 99.99,
                        'currency' => 'EUR',
                        'type' => 'payment',
                        'date' => '2024-01-15',
                    ],
                    [
                        'transaction_id' => 'TXN002',
                        'amount' => 49.50,
                        'currency' => 'USD',
                        'type' => 'refund',
                        'date' => '2024-01-16',
                    ],
                ],
                'total_count' => 2,
            ],
        ];
        $response = ListTransactionsResponse::fromArray($data);

        $this->assertInstanceOf(ListTransactionsResponse::class, $response);
        $this->assertIsArray($response->getData());
        $this->assertIsArray($response->getTransactionList());
        $this->assertCount(2, $response->getTransactionList());
        $this->assertSame('TXN001', $response->getTransactionList()[0]['transaction_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'transaction_list' => [
                        [
                            'transaction_id' => 'TXN999',
                            'amount' => 29.99,
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListTransactionsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListTransactionsResponse::class, $response);
        $this->assertCount(1, $response->getTransactionList());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'transaction_list' => [],
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = ListTransactionsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
