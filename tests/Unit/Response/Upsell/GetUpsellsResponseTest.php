<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Upsell;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Upsell\GetUpsellsResponse;
use PHPUnit\Framework\TestCase;

final class GetUpsellsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'upsells' => [
                    [
                        'upsell_id' => 'UPS001',
                        'product_id' => '100',
                        'target_product_id' => '200',
                        'type' => 'one_time',
                    ],
                    [
                        'upsell_id' => 'UPS002',
                        'product_id' => '200',
                        'target_product_id' => '300',
                        'type' => 'recurring',
                    ],
                ],
            ],
        ];
        $response = GetUpsellsResponse::fromArray($data);

        $this->assertInstanceOf(GetUpsellsResponse::class, $response);
        $upsells = $response->getUpsells();
        $this->assertCount(2, $upsells);
        $this->assertNotEmpty($upsells);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'upsells' => [
                        ['upsell_id' => 'UPS999'],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetUpsellsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetUpsellsResponse::class, $response);
        $this->assertCount(1, $response->getUpsells());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'upsells' => [],
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetUpsellsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
