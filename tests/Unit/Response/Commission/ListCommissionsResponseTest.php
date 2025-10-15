<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Commission;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Commission\ListCommissionsResponse;
use PHPUnit\Framework\TestCase;

final class ListCommissionsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'page_no' => 1,
            'page_size' => 10,
            'item_count' => 25,
            'page_count' => 3,
            'items' => [
                [
                    'id' => 1,
                    'created_at' => '2024-01-01',
                    'amount' => 50.00,
                    'currency' => 'EUR',
                    'reason' => 'Sale commission',
                    'schedule_payout_at' => '2024-02-01',
                    'transaction_id' => 100,
                    'purchase_id' => 'P123',
                ],
            ],
        ];
        $response = ListCommissionsResponse::fromArray($data);

        $this->assertInstanceOf(ListCommissionsResponse::class, $response);
        $this->assertSame(1, $response->getPageNo());
        $this->assertCount(1, $response->getItems());
        $this->assertTrue($response->hasMorePages());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'page_no' => 1,
                'page_size' => 10,
                'item_count' => 25,
                'page_count' => 3,
                'items' => [],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListCommissionsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListCommissionsResponse::class, $response);
        $this->assertSame(1, $response->getPageNo());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListCommissionsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
