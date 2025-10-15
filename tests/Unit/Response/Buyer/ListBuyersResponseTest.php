<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Buyer;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Buyer\ListBuyersResponse;
use PHPUnit\Framework\TestCase;

final class ListBuyersResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'buyer_list' => [
                    ['buyer_id' => 'BUY1', 'email' => 'buyer1@example.com'],
                    ['buyer_id' => 'BUY2', 'email' => 'buyer2@example.com'],
                ],
            ],
        ];
        $response = ListBuyersResponse::fromArray($data);

        $this->assertInstanceOf(ListBuyersResponse::class, $response);
        $this->assertCount(2, $response->getBuyerList());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'buyer_list' => [
                        ['buyer_id' => 'BUY1'],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListBuyersResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListBuyersResponse::class, $response);
        $this->assertCount(1, $response->getBuyerList());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = ListBuyersResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
