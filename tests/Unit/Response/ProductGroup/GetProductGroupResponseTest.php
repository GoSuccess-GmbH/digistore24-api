<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ProductGroup;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\ProductGroup\GetProductGroupResponse;
use PHPUnit\Framework\TestCase;

final class GetProductGroupResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'product_group' => [
                    'group_id' => 'PG001',
                    'name' => 'Premium Products',
                    'product_count' => 5,
                ],
            ],
        ];
        $response = GetProductGroupResponse::fromArray($data);

        $this->assertInstanceOf(GetProductGroupResponse::class, $response);
        $this->assertArrayHasKey('group_id', $response->productGroup);
        $this->assertSame('PG001', $response->productGroup['group_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'product_group' => [
                        'group_id' => 'PG002',
                        'name' => 'Basic Products',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetProductGroupResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetProductGroupResponse::class, $response);
        $this->assertSame('Basic Products', $response->productGroup['name']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = GetProductGroupResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
