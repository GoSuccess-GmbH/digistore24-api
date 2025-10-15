<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Marketplace;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Marketplace\ListMarketplaceEntriesResponse;
use PHPUnit\Framework\TestCase;

final class ListMarketplaceEntriesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'entries' => [
                    [
                        'entry_id' => 'ENTRY123',
                        'product_name' => 'Amazing Product',
                        'status' => 'active',
                    ],
                    [
                        'entry_id' => 'ENTRY456',
                        'product_name' => 'Great Service',
                        'status' => 'pending',
                    ],
                ],
            ],
        ];
        $response = ListMarketplaceEntriesResponse::fromArray($data);

        $this->assertInstanceOf(ListMarketplaceEntriesResponse::class, $response);
        $this->assertCount(2, $response->getEntries());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'entries' => [
                        [
                            'entry_id' => 'ENTRY789',
                            'product_name' => 'New Product',
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListMarketplaceEntriesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListMarketplaceEntriesResponse::class, $response);
        $this->assertCount(1, $response->getEntries());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListMarketplaceEntriesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
