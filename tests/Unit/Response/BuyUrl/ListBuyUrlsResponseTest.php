<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\BuyUrl;

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
                ],
                [
                    'id' => 2,
                    'url' => 'https://digistore24.com/buy/url2',
                ],
            ],
        ];
        $response = ListBuyUrlsResponse::fromArray($data);

        $this->assertInstanceOf(ListBuyUrlsResponse::class, $response);
        $this->assertCount(2, $response->items);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'items' => [
                    ['id' => 1, 'url' => 'https://digistore24.com/buy/url1'],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListBuyUrlsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListBuyUrlsResponse::class, $response);
        $this->assertCount(1, $response->items);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListBuyUrlsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
