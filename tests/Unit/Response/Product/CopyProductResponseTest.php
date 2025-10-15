<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Product;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Product\CopyProductResponse;
use PHPUnit\Framework\TestCase;

final class CopyProductResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'product_id' => 654321,
            ],
        ];
        $response = CopyProductResponse::fromArray($data);

        $this->assertInstanceOf(CopyProductResponse::class, $response);
        $this->assertSame(654321, $response->getProductId());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'product_id' => 111222,
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = CopyProductResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(CopyProductResponse::class, $response);
        $this->assertSame(111222, $response->getProductId());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = CopyProductResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
