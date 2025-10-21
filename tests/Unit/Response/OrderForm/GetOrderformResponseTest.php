<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\OrderForm;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\OrderForm\GetOrderformResponse;
use PHPUnit\Framework\TestCase;

final class GetOrderformResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'orderform_id' => 'OF123',
                'name' => 'My Order Form',
                'product_id' => 456,
                'status' => 'active',
            ],
        ];
        $response = GetOrderformResponse::fromArray($data);

        $this->assertInstanceOf(GetOrderformResponse::class, $response);
        $this->assertArrayHasKey('orderform_id', $response->data);
        $this->assertSame('OF123', $response->data['orderform_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'orderform_id' => 'OF456',
                    'name' => 'Premium Form',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetOrderformResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetOrderformResponse::class, $response);
        $this->assertSame('Premium Form', $response->data['name']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = GetOrderformResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
