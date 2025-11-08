<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\BuyUrl\DeleteBuyUrlResponse;
use PHPUnit\Framework\TestCase;

final class DeleteBuyUrlResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
        ];

        $response = DeleteBuyUrlResponse::fromArray(data: $data);

        $this->assertInstanceOf(DeleteBuyUrlResponse::class, $response);
        $this->assertSame('success', $response->result);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = DeleteBuyUrlResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(DeleteBuyUrlResponse::class, $response);
        $this->assertSame('success', $response->result);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success'],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = DeleteBuyUrlResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
