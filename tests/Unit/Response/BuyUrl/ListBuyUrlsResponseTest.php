<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Response\BuyUrl\ListBuyUrlsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListBuyUrlsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = ListBuyUrlsResponse::fromArray($data);
        
        $this->assertInstanceOf(ListBuyUrlsResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = ListBuyUrlsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListBuyUrlsResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListBuyUrlsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

