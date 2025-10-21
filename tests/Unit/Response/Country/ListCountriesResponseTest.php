<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Country;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Country\ListCountriesResponse;
use PHPUnit\Framework\TestCase;

final class ListCountriesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'countries' => [
                    ['code' => 'DE', 'name' => 'Germany'],
                    ['code' => 'US', 'name' => 'United States'],
                    ['code' => 'FR', 'name' => 'France'],
                ],
                'total' => 3,
            ],
        ];
        $response = ListCountriesResponse::fromArray($data);

        $this->assertInstanceOf(ListCountriesResponse::class, $response);
        $this->assertCount(3, $response->countries);
        $this->assertSame(3, $response->total);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'countries' => [
                        ['code' => 'DE', 'name' => 'Germany'],
                        ['code' => 'US', 'name' => 'United States'],
                    ],
                    'total' => 2,
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListCountriesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListCountriesResponse::class, $response);
        $this->assertCount(2, $response->countries);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListCountriesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
