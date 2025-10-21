<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ApiKey;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\ApiKey\RetrieveApiKeyResponse;
use PHPUnit\Framework\TestCase;

final class RetrieveApiKeyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'api_key_id' => 'KEY123',
                'description' => 'Production Server',
                'created_at' => '2025-01-15 10:30:00',
                'last_used_at' => '2025-10-15 14:25:00',
                'is_active' => true,
                'permissions' => ['read', 'write'],
                'rate_limit' => 1000,
                'requests_today' => 450,
            ],
        ];

        $response = RetrieveApiKeyResponse::fromArray(data: $data);

        $this->assertInstanceOf(RetrieveApiKeyResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertSame('KEY123', $response->apiKeyId);
        $this->assertSame('Production Server', $response->description);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->createdAt);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->lastUsedAt);
        $this->assertTrue($response->isActive);
        $this->assertContains('read', $response->permissions);
        $this->assertContains('write', $response->permissions);
        $this->assertSame(1000, $response->rateLimit);
        $this->assertSame(450, $response->requestsToday);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'api_key_id' => 'KEY456',
                    'description' => 'Test Server',
                    'created_at' => '2025-01-15 10:30:00',
                    'is_active' => false,
                    'permissions' => ['read'],
                    'rate_limit' => 500,
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = RetrieveApiKeyResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(RetrieveApiKeyResponse::class, $response);
        $this->assertSame('KEY456', $response->apiKeyId);
        $this->assertSame('Test Server', $response->description);
        $this->assertFalse($response->isActive);
        $this->assertSame(500, $response->rateLimit);
    }

    public function test_handles_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'api_key_id' => 'MINIMAL',
                'is_active' => true,
            ],
        ];

        $response = RetrieveApiKeyResponse::fromArray(data: $data);

        $this->assertInstanceOf(RetrieveApiKeyResponse::class, $response);
        $this->assertSame('MINIMAL', $response->apiKeyId);
        $this->assertTrue($response->isActive);
        $this->assertNull($response->description);
        $this->assertNull($response->createdAt);
        $this->assertNull($response->lastUsedAt);
        $this->assertEmpty($response->permissions);
        $this->assertNull($response->rateLimit);
        $this->assertNull($response->requestsToday);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => ['api_key_id' => 'TEST', 'is_active' => true],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = RetrieveApiKeyResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
