<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Buyer;

use GoSuccess\Digistore24\Api\DTO\BuyerData;
use GoSuccess\Digistore24\Api\Enum\BuyerType;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Buyer\GetBuyerResponse;
use PHPUnit\Framework\TestCase;

final class GetBuyerResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'buyer' => [
                    'salutation_msg' => '',
                    'street' => 'Starße 1',
                    'buyer_type' => 'business',
                    'id' => '18141656',
                    'address_id' => '35288471',
                    'street_name' => 'Starße',
                    'created_at' => '2024-09-09 18:31:47',
                    'email' => 'paul@gosuccess.io',
                    'first_name' => 'Paul',
                    'last_name' => 'Gossen',
                    'salutation' => '',
                    'title' => '',
                    'company' => 'Testfirma',
                    'street_number' => '1',
                    'street2' => '',
                    'zipcode' => '12345',
                    'city' => 'Stadt',
                    'state' => '',
                    'country' => 'DE',
                    'phone_no' => '',
                ],
            ],
        ];

        $response = GetBuyerResponse::fromArray($data);

        $this->assertInstanceOf(GetBuyerResponse::class, $response);
        $this->assertInstanceOf(BuyerData::class, $response->buyer);
        $this->assertSame(18141656, $response->buyer->id);
        $this->assertSame(35288471, $response->buyer->addressId);
        $this->assertSame('paul@gosuccess.io', $response->buyer->email);
        $this->assertSame('Paul', $response->buyer->firstName);
        $this->assertSame('Gossen', $response->buyer->lastName);
        $this->assertSame('Testfirma', $response->buyer->company);
        $this->assertSame(BuyerType::BUSINESS, $response->buyer->buyerType);
        $this->assertSame('Starße 1', $response->buyer->street);
        $this->assertSame('Starße', $response->buyer->streetName);
        $this->assertSame('1', $response->buyer->streetNumber);
        $this->assertSame('12345', $response->buyer->zipcode);
        $this->assertSame('Stadt', $response->buyer->city);
        $this->assertSame('DE', $response->buyer->country);
        $this->assertNotNull($response->buyer->createdAt);
        $this->assertSame('2024-09-09', $response->buyer->createdAt->format('Y-m-d'));
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'buyer' => [
                        'id' => '123',
                        'email' => 'buyer@example.com',
                        'first_name' => 'John',
                        'last_name' => 'Doe',
                        'buyer_type' => 'consumer',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetBuyerResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetBuyerResponse::class, $response);
        $this->assertInstanceOf(BuyerData::class, $response->buyer);
        $this->assertSame(123, $response->buyer->id);
        $this->assertSame('buyer@example.com', $response->buyer->email);
        $this->assertSame('John', $response->buyer->firstName);
        $this->assertSame('Doe', $response->buyer->lastName);
        $this->assertSame(BuyerType::CONSUMER, $response->buyer->buyerType);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'buyer' => [
                        'email' => 'test@example.com',
                    ],
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetBuyerResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }

    public function test_handles_empty_buyer_data(): void
    {
        $data = [
            'data' => [
                'buyer' => [],
            ],
        ];

        $response = GetBuyerResponse::fromArray($data);

        $this->assertInstanceOf(BuyerData::class, $response->buyer);
        $this->assertSame('', $response->buyer->email);
        $this->assertNull($response->buyer->id);
        $this->assertNull($response->buyer->firstName);
    }

    public function test_handles_missing_buyer_key(): void
    {
        $data = [
            'data' => [],
        ];

        $response = GetBuyerResponse::fromArray($data);

        $this->assertInstanceOf(BuyerData::class, $response->buyer);
        $this->assertSame('', $response->buyer->email);
    }
}
