<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Purchase\ListPurchasesOfEmailResponse;
use PHPUnit\Framework\TestCase;

final class ListPurchasesOfEmailResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                [
                    'purchase_id' => 'P111',
                    'product_name' => 'Product A',
                    'amount' => 99.99,
                ],
                [
                    'purchase_id' => 'P222',
                    'product_name' => 'Product B',
                    'amount' => 49.50,
                ],
            ],
        ];
        $response = ListPurchasesOfEmailResponse::fromArray($data);

        $this->assertInstanceOf(ListPurchasesOfEmailResponse::class, $response);
        $this->assertIsArray($response->getPurchases());
        $this->assertCount(2, $response->getPurchases());
        $this->assertSame('P111', $response->getPurchases()[0]['purchase_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    [
                        'purchase_id' => 'P333',
                        'product_name' => 'Product C',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListPurchasesOfEmailResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListPurchasesOfEmailResponse::class, $response);
        $this->assertCount(1, $response->getPurchases());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = ListPurchasesOfEmailResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
