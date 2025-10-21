<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Purchase\GetCustomerToAffiliateBuyerDetailsResponse;
use PHPUnit\Framework\TestCase;

final class GetCustomerToAffiliateBuyerDetailsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'buyer_email' => 'buyer@example.com',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'affiliate_id' => 'AFF123',
                'purchase_id' => 'P456789',
            ],
        ];
        $response = GetCustomerToAffiliateBuyerDetailsResponse::fromArray($data);

        $this->assertInstanceOf(GetCustomerToAffiliateBuyerDetailsResponse::class, $response);
        $this->assertSame('buyer@example.com', $response->details['buyer_email']);
        $this->assertSame('John', $response->details['first_name']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'data' => [
                        'buyer_email' => 'customer@test.com',
                        'affiliate_id' => 'AFF999',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetCustomerToAffiliateBuyerDetailsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetCustomerToAffiliateBuyerDetailsResponse::class, $response);
        $this->assertSame('customer@test.com', $response->details['buyer_email']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'data' => [
                        'buyer_email' => 'test@example.com',
                    ],
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetCustomerToAffiliateBuyerDetailsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
