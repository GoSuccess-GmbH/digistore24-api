<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ApiKey;

use GoSuccess\Digistore24\Api\Response\ApiKey\RetrieveApiKeyResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class RetrieveApiKeyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = ['data' => ['api_key' => 'test-api-key-123']];
        $response = RetrieveApiKeyResponse::fromArray($data);
        
        $this->assertInstanceOf(RetrieveApiKeyResponse::class, $response);
        $this->assertSame('test-api-key-123', $response->getApiKey());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['api_key' => 'test-api-key-123']],
            headers: [],
            rawBody: ''
        );
        
        $response = RetrieveApiKeyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(RetrieveApiKeyResponse::class, $response);
        $this->assertSame('test-api-key-123', $response->getApiKey());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = RetrieveApiKeyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

