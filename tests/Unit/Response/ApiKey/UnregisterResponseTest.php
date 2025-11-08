<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ApiKey;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\ApiKey\UnregisterResponse;
use PHPUnit\Framework\TestCase;

final class UnregisterResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'api_key_id' => 'KEY123',
                'revoked_at' => '2025-10-15 14:30:00',
                'message' => 'API key has been revoked successfully',
            ],
        ];

        $response = UnregisterResponse::fromArray(data: $data);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('KEY123', $response->apiKeyId);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->revokedAt);
        $this->assertSame('API key has been revoked successfully', $response->message);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'api_key_id' => 'KEY456',
                    'revoked_at' => '2025-10-15 14:30:00',
                    'message' => 'Revoked',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = UnregisterResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('KEY456', $response->apiKeyId);
        $this->assertSame('Revoked', $response->message);
    }

    public function test_handles_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'api_key_id' => 'MINIMAL',
            ],
        ];

        $response = UnregisterResponse::fromArray(data: $data);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertSame('MINIMAL', $response->apiKeyId);
        $this->assertNull($response->revokedAt);
        $this->assertNull($response->message);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => ['api_key_id' => 'TEST'],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = UnregisterResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
