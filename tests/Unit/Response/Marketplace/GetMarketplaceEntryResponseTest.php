<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Marketplace;

use GoSuccess\Digistore24\Api\Response\Marketplace\GetMarketplaceEntryResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetMarketplaceEntryResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'entry_id' => 'ENTRY001',
                'product_name' => 'Premium Course',
                'description' => 'Learn advanced techniques',
                'price' => 99.99,
                'status' => 'active'
            ]
        ];
        $response = GetMarketplaceEntryResponse::fromArray($data);
        
        $this->assertInstanceOf(GetMarketplaceEntryResponse::class, $response);
        $this->assertArrayHasKey('entry_id', $response->getData());
        $this->assertSame('ENTRY001', $response->getData()['entry_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'entry_id' => 'ENTRY002',
                    'product_name' => 'Starter Package',
                    'price' => 49.99
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetMarketplaceEntryResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetMarketplaceEntryResponse::class, $response);
        $this->assertSame('Starter Package', $response->getData()['product_name']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetMarketplaceEntryResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

