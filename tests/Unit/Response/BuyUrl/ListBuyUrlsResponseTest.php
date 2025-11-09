<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\BuyUrl;

use GoSuccess\Digistore24\Api\DTO\BuyUrlData;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\BuyUrl\ListBuyUrlsResponse;
use PHPUnit\Framework\TestCase;

final class ListBuyUrlsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'items' => [
                [
                    'id' => 1,
                    'product_id' => 12345,
                    'url' => 'https://digistore24.com/buy/url1',
                    'created_at' => '2025-10-01T10:30:00Z',
                    'modified_at' => '2025-10-14T15:45:00Z',
                ],
                [
                    'id' => 2,
                    'product_id' => 67890,
                    'url' => 'https://digistore24.com/buy/url2',
                    'created_at' => '2025-10-10T14:20:00Z',
                    'modified_at' => '2025-10-10T14:20:00Z',
                ],
            ],
        ];

        $response = ListBuyUrlsResponse::fromArray(data: $data);

        $this->assertInstanceOf(ListBuyUrlsResponse::class, $response);
        $this->assertCount(2, $response->items);

        // Validate first item
        $firstItem = $response->items[0];
        $this->assertInstanceOf(BuyUrlData::class, $firstItem);
        $this->assertSame(1, $firstItem->id);
        $this->assertSame(12345, $firstItem->productId);
        $this->assertSame('https://digistore24.com/buy/url1', $firstItem->url);
        $this->assertInstanceOf(\DateTimeInterface::class, $firstItem->createdAt);
        $this->assertInstanceOf(\DateTimeInterface::class, $firstItem->modifiedAt);

        // Validate second item
        $secondItem = $response->items[1];
        $this->assertInstanceOf(BuyUrlData::class, $secondItem);
        $this->assertSame(2, $secondItem->id);
        $this->assertSame(67890, $secondItem->productId);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'items' => [
                    [
                        'id' => 1,
                        'product_id' => 12345,
                        'url' => 'https://digistore24.com/buy/url1',
                        'created_at' => '2025-10-01T10:30:00Z',
                        'modified_at' => '2025-10-14T15:45:00Z',
                    ],
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"items":[]}',
        );

        $response = ListBuyUrlsResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(ListBuyUrlsResponse::class, $response);
        $this->assertCount(1, $response->items);
        $this->assertInstanceOf(BuyUrlData::class, $response->items[0]);
        $this->assertSame(1, $response->items[0]->id);
    }

    public function test_handles_empty_items(): void
    {
        $data = ['items' => []];

        $response = ListBuyUrlsResponse::fromArray(data: $data);

        $this->assertInstanceOf(ListBuyUrlsResponse::class, $response);
        $this->assertCount(0, $response->items);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['items' => []],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = ListBuyUrlsResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
