<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\OrderForm;

use GoSuccess\Digistore24\Api\Response\OrderForm\UpdateOrderformResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class UpdateOrderformResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = UpdateOrderformResponse::fromArray($data);
        
        $this->assertInstanceOf(UpdateOrderformResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = UpdateOrderformResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(UpdateOrderformResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = UpdateOrderformResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

