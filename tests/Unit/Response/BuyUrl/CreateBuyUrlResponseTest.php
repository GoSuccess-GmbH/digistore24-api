<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\BuyUrl\CreateBuyUrlResponse;
use PHPUnit\Framework\TestCase;

final class CreateBuyUrlResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'id' => '123',
            'url' => 'https://digistore24.com/buy/12345',
            'valid_until' => '2024-12-31',
        ];
        $response = CreateBuyUrlResponse::fromArray($data);

        $this->assertInstanceOf(CreateBuyUrlResponse::class, $response);
        $this->assertSame('123', $response->id);
        $this->assertSame('https://digistore24.com/buy/12345', $response->url);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'id' => '123',
                'url' => 'https://digistore24.com/buy/12345',
            ],
            headers: [],
            rawBody: '',
        );

        $response = CreateBuyUrlResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(CreateBuyUrlResponse::class, $response);
        $this->assertSame('123', $response->id);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = CreateBuyUrlResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
