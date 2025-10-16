<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Country;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Country\ListCurrenciesResponse;
use PHPUnit\Framework\TestCase;

final class ListCurrenciesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                [
                    'id' => 1,
                    'code' => 'EUR',
                    'symbol' => '€',
                    'min_price' => 1.00,
                    'max_price' => 9999.99,
                    'name' => 'Euro',
                ],
                [
                    'id' => 2,
                    'code' => 'USD',
                    'symbol' => '$',
                    'min_price' => 1.00,
                    'max_price' => 9999.99,
                    'name' => 'US Dollar',
                ],
            ],
        ];
        $response = ListCurrenciesResponse::fromArray($data);

        $this->assertInstanceOf(ListCurrenciesResponse::class, $response);
        $this->assertCount(2, $response->getCurrencies());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    [
                        'id' => 1,
                        'code' => 'EUR',
                        'symbol' => '€',
                        'min_price' => 1.00,
                        'max_price' => 9999.99,
                        'name' => 'Euro',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListCurrenciesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListCurrenciesResponse::class, $response);
        $this->assertCount(1, $response->getCurrencies());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListCurrenciesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
