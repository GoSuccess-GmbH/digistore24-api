<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ApiKey;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\ApiKey\RequestApiKeyResponse;
use PHPUnit\Framework\TestCase;

final class RequestApiKeyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'api_key' => 'test-api-key-12345',
                'created_at' => '2025-10-15 14:30:00',
                'description' => 'Production Server',
                'permissions' => ['read', 'write'],
                'rate_limit' => 1000,
            ],
        ];

        $response = RequestApiKeyResponse::fromArray(data: $data);

        $this->assertInstanceOf(RequestApiKeyResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('test-api-key-12345', $response->apiKey);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->createdAt);
        $this->assertSame('Production Server', $response->description);
        $this->assertIsArray($response->permissions);
        $this->assertContains('read', $response->permissions);
        $this->assertContains('write', $response->permissions);
        $this->assertSame(1000, $response->rateLimit);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'api_key' => 'test-api-key-67890',
                    'created_at' => '2025-10-15 14:30:00',
                    'description' => 'Test Server',
                    'permissions' => ['read'],
                    'rate_limit' => 500,
                ],
            ],
            headers: [],
            rawBody: '{"result":"success"}',
        );

        $response = RequestApiKeyResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(RequestApiKeyResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('test-api-key-67890', $response->apiKey);
        $this->assertSame('Test Server', $response->description);
        $this->assertSame(500, $response->rateLimit);
    }

    public function test_handles_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'api_key' => 'minimal-key',
            ],
        ];

        $response = RequestApiKeyResponse::fromArray(data: $data);

        $this->assertInstanceOf(RequestApiKeyResponse::class, $response);
        $this->assertSame('minimal-key', $response->apiKey);
        $this->assertNull($response->description);
        $this->assertNull($response->createdAt);
        $this->assertIsArray($response->permissions);
        $this->assertEmpty($response->permissions);
        $this->assertNull($response->rateLimit);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => ['api_key' => 'test-key'],
            ],
            headers: ['Content-Type' => 'application/json'],
            rawBody: 'test body',
        );

        $response = RequestApiKeyResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
