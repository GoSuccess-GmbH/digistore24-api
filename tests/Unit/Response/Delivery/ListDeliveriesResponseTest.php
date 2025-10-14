<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Delivery;

use GoSuccess\Digistore24\Api\Response\Delivery\ListDeliveriesResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListDeliveriesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = ListDeliveriesResponse::fromArray($data);
        
        $this->assertInstanceOf(ListDeliveriesResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = ListDeliveriesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListDeliveriesResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListDeliveriesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

