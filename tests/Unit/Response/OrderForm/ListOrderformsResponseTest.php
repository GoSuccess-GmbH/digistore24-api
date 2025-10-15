<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\OrderForm;

use GoSuccess\Digistore24\Api\Response\OrderForm\ListOrderformsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListOrderformsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'orderforms' => [
                    [
                        'orderform_id' => 'OF001',
                        'name' => 'Standard Form',
                        'product_id' => 123
                    ],
                    [
                        'orderform_id' => 'OF002',
                        'name' => 'Premium Form',
                        'product_id' => 456
                    ]
                ]
            ]
        ];
        $response = ListOrderformsResponse::fromArray($data);
        
        $this->assertInstanceOf(ListOrderformsResponse::class, $response);
        $this->assertCount(2, $response->getOrderforms());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'orderforms' => [
                        [
                            'orderform_id' => 'OF003',
                            'name' => 'Basic Form'
                        ]
                    ]
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ListOrderformsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListOrderformsResponse::class, $response);
        $this->assertCount(1, $response->getOrderforms());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListOrderformsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

