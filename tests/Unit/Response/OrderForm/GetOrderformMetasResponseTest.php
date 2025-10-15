<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\OrderForm;

use GoSuccess\Digistore24\Api\Response\OrderForm\GetOrderformMetasResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetOrderformMetasResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'meta_key_1' => 'value1',
                'meta_key_2' => 'value2',
                'custom_field' => 'custom value'
            ]
        ];
        $response = GetOrderformMetasResponse::fromArray($data);
        
        $this->assertInstanceOf(GetOrderformMetasResponse::class, $response);
        $this->assertArrayHasKey('meta_key_1', $response->getMetas());
        $this->assertSame('value1', $response->getMetas()['meta_key_1']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'title' => 'Order Form Title',
                    'description' => 'Form description'
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetOrderformMetasResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetOrderformMetasResponse::class, $response);
        $this->assertSame('Order Form Title', $response->getData()['title']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetOrderformMetasResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

