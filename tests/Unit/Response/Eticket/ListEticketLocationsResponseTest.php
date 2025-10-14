<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Eticket;

use GoSuccess\Digistore24\Api\Response\Eticket\ListEticketLocationsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListEticketLocationsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'locations' => [
                [
                    'location_id' => 'LOC123',
                    'location_name' => 'Convention Center',
                    'address' => '123 Main St',
                    'city' => 'Berlin',
                    'country' => 'Germany'
                ]
            ]
        ];
        $response = ListEticketLocationsResponse::fromArray($data);
        
        $this->assertInstanceOf(ListEticketLocationsResponse::class, $response);
        $this->assertCount(1, $response->locations);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'locations' => [
                    [
                        'location_id' => 'LOC123',
                        'location_name' => 'Convention Center'
                    ]
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ListEticketLocationsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListEticketLocationsResponse::class, $response);
        $this->assertCount(1, $response->locations);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListEticketLocationsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

