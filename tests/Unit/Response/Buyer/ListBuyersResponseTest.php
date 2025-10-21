<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Buyer;

use GoSuccess\Digistore24\Api\DTO\BuyerData;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Buyer\ListBuyersResponse;
use PHPUnit\Framework\TestCase;

final class ListBuyersResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'total' => 2,
                'buyers' => [
                    [
                        'id' => 20,
                        'address_id' => 25,
                        'created_at' => '2012-05-06 17:50:30',
                        'email' => 'buyer1@example.com',
                        'first_name' => 'John',
                        'last_name' => 'Doe',
                        'salutation' => 'M',
                        'title' => null,
                        'company' => null,
                        'street' => 'Some Street 42',
                        'street_name' => 'Some Street',
                        'street_number' => '42',
                        'zipcode' => '12345',
                        'city' => 'Test City',
                        'state' => null,
                        'country' => 'DE',
                        'phone_no' => null,
                    ],
                    [
                        'id' => 30,
                        'address_id' => 35,
                        'created_at' => '2012-06-10 08:20:15',
                        'email' => 'buyer2@example.com',
                        'first_name' => 'Jane',
                        'last_name' => 'Smith',
                        'salutation' => 'F',
                        'title' => 'Dr.',
                        'company' => 'Test GmbH',
                        'street' => 'Another Street 123',
                        'street_name' => 'Another Street',
                        'street_number' => '123',
                        'zipcode' => '54321',
                        'city' => 'Another City',
                        'state' => 'BY',
                        'country' => 'DE',
                        'phone_no' => '+49123456789',
                    ],
                ],
            ],
        ];

        $response = ListBuyersResponse::fromArray($data);

        $this->assertSame(2, $response->total);
        $this->assertCount(2, $response->buyers);
        $this->assertInstanceOf(BuyerData::class, $response->buyers[0]);
        $this->assertSame(20, $response->buyers[0]->id);
        $this->assertSame('buyer1@example.com', $response->buyers[0]->email);
        $this->assertSame('John', $response->buyers[0]->firstName);
        $this->assertSame('Jane', $response->buyers[1]->firstName);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'total' => 1,
                    'buyers' => [
                        [
                            'id' => 100,
                            'address_id' => 150,
                            'email' => 'test@example.com',
                            'first_name' => 'Test',
                            'last_name' => 'User',
                            'salutation' => 'M',
                            'street' => 'Test St 1',
                            'zipcode' => '99999',
                            'city' => 'Testville',
                            'country' => 'US',
                            'created_at' => '2024-01-01 12:00:00',
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListBuyersResponse::fromResponse($httpResponse);

        $this->assertCount(1, $response->buyers);
        $this->assertSame(100, $response->buyers[0]->id);
    }

    public function test_handles_empty_items(): void
    {
        $data = [
            'data' => [
                'total' => 0,
                'buyers' => [],
            ],
        ];

        $response = ListBuyersResponse::fromArray($data);

        $this->assertCount(0, $response->buyers);
        $this->assertSame(0, $response->total);
    }

    public function test_handles_missing_data(): void
    {
        $data = ['data' => []];

        $response = ListBuyersResponse::fromArray($data);

        $this->assertCount(0, $response->buyers);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['buyers' => []]],
            headers: [],
            rawBody: 'test',
        );

        $response = ListBuyersResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
