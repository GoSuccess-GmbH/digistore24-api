<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Delivery;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Delivery\GetDeliveryResponse;
use PHPUnit\Framework\TestCase;

final class GetDeliveryResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'delivery_id' => 'DEL123',
                'status' => 'shipped',
                'tracking_number' => 'TRACK123',
            ],
        ];
        $response = GetDeliveryResponse::fromArray($data);

        $this->assertInstanceOf(GetDeliveryResponse::class, $response);
        $this->assertArrayHasKey('delivery_id', $response->getData());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'delivery_id' => 'DEL123',
                    'status' => 'shipped',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetDeliveryResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetDeliveryResponse::class, $response);
        $this->assertArrayHasKey('delivery_id', $response->getData());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = GetDeliveryResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
