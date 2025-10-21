<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Buyer;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Buyer\UpdateBuyerResponse;
use PHPUnit\Framework\TestCase;

final class UpdateBuyerResponseTest extends TestCase
{
    public function test_can_create_from_array_modified(): void
    {
        $data = [
            'data' => [
                'buyer_id' => 123,
                'email' => 'test@example.com',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'updated_at' => '2024-01-01 12:00:00',
            ],
        ];

        $response = UpdateBuyerResponse::fromArray($data);

        $this->assertInstanceOf(UpdateBuyerResponse::class, $response);
        $this->assertSame(123, $response->buyerId);
        $this->assertSame('test@example.com', $response->email);
    }

    public function test_can_create_from_array_not_modified(): void
    {
        $data = [
            'data' => [
                'buyer_id' => 456,
                'email' => 'other@example.com',
            ],
        ];

        $response = UpdateBuyerResponse::fromArray($data);

        $this->assertSame(456, $response->buyerId);
        $this->assertSame('other@example.com', $response->email);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'buyer_id' => 789,
                    'email' => 'response@example.com',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = UpdateBuyerResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(UpdateBuyerResponse::class, $response);
        $this->assertSame(789, $response->buyerId);
    }

    public function test_handles_missing_data(): void
    {
        $data = ['data' => []];

        $response = UpdateBuyerResponse::fromArray($data);

        $this->assertNull($response->buyerId);
        $this->assertSame('', $response->email);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = UpdateBuyerResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
