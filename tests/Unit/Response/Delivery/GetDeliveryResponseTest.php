<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Delivery;

use GoSuccess\Digistore24\Api\DTO\DeliveryDetailsData;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Delivery\GetDeliveryResponse;
use PHPUnit\Framework\TestCase;

final class GetDeliveryResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'delivery' => [
                    'id' => 3634,
                    'purchase_id' => 'P123456',
                    'product_name' => 'Test Product',
                    'is_test_order' => 'N',
                ],
                'is_set_in_progress' => 'N',
            ],
        ];
        $response = GetDeliveryResponse::fromArray($data);

        $this->assertInstanceOf(GetDeliveryResponse::class, $response);
        $this->assertInstanceOf(DeliveryDetailsData::class, $response->delivery);
        $this->assertFalse($response->isSetInProgress);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'delivery' => [
                        'id' => 3634,
                        'product_name' => 'Test Product',
                        'is_test_order' => 'Y',
                    ],
                    'is_set_in_progress' => 'Y',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetDeliveryResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetDeliveryResponse::class, $response);
        $this->assertInstanceOf(DeliveryDetailsData::class, $response->delivery);
        $this->assertTrue($response->isSetInProgress);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'delivery' => [],
                    'is_set_in_progress' => 'N',
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetDeliveryResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
