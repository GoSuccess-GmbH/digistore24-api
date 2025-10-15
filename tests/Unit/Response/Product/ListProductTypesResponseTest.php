<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Product;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Product\ListProductTypesResponse;
use PHPUnit\Framework\TestCase;

final class ListProductTypesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            ['id' => 1, 'name' => 'Digital Product', 'category' => 'digital'],
            ['id' => 2, 'name' => 'Physical Product', 'category' => 'physical'],
            ['id' => 3, 'name' => 'Service', 'category' => 'service'],
        ];
        $response = ListProductTypesResponse::fromArray($data);

        $this->assertInstanceOf(ListProductTypesResponse::class, $response);
        $this->assertCount(3, $response->getProductTypes());
        $this->assertNotNull($response->getProductTypeById(1));
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                ['id' => 10, 'name' => 'Membership', 'category' => 'subscription'],
                ['id' => 11, 'name' => 'Course', 'category' => 'digital'],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListProductTypesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListProductTypesResponse::class, $response);
        $this->assertCount(2, $response->getProductTypes());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListProductTypesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
