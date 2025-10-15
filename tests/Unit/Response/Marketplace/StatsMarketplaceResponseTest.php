<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Marketplace;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Marketplace\StatsMarketplaceResponse;
use PHPUnit\Framework\TestCase;

final class StatsMarketplaceResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'total_entries' => 50,
                'active_entries' => 42,
                'inactive_entries' => 8,
                'total_views' => 1250,
            ],
        ];
        $response = StatsMarketplaceResponse::fromArray($data);

        $this->assertInstanceOf(StatsMarketplaceResponse::class, $response);
        $this->assertArrayHasKey('total_entries', $response->getData());
        $this->assertSame(50, $response->getData()['total_entries']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'total_entries' => 100,
                    'active_entries' => 85,
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = StatsMarketplaceResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(StatsMarketplaceResponse::class, $response);
        $this->assertSame(100, $response->getData()['total_entries']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = StatsMarketplaceResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
