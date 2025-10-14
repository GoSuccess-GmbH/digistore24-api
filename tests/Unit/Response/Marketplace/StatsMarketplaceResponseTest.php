<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Marketplace;

use GoSuccess\Digistore24\Api\Response\Marketplace\StatsMarketplaceResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class StatsMarketplaceResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = StatsMarketplaceResponse::fromArray($data);
        
        $this->assertInstanceOf(StatsMarketplaceResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = StatsMarketplaceResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(StatsMarketplaceResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = StatsMarketplaceResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

