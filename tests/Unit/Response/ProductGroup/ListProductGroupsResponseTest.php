<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ProductGroup;

use GoSuccess\Digistore24\Api\Response\ProductGroup\ListProductGroupsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListProductGroupsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'product_groups' => [
                    [
                        'group_id' => 'PG01',
                        'name' => 'Group A',
                        'product_count' => 3
                    ],
                    [
                        'group_id' => 'PG02',
                        'name' => 'Group B',
                        'product_count' => 5
                    ]
                ]
            ]
        ];
        $response = ListProductGroupsResponse::fromArray($data);
        
        $this->assertInstanceOf(ListProductGroupsResponse::class, $response);
        $this->assertCount(2, $response->getProductGroups());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'product_groups' => [
                        [
                            'group_id' => 'PG03',
                            'name' => 'Group C'
                        ]
                    ]
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ListProductGroupsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListProductGroupsResponse::class, $response);
        $this->assertCount(1, $response->getProductGroups());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListProductGroupsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

