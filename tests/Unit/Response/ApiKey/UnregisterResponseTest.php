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
                'modified' => 'Y',
                'note' => 'Der API-Schlüssel wurde gelöscht.',
            ],
        ];

        $response = UnregisterResponse::fromArray(data: $data);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->modified);
        $this->assertSame('Der API-Schlüssel wurde gelöscht.', $response->note);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'modified' => 'Y',
                    'note' => 'API key revoked',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: '{"result":"success"}',
        );

        $response = UnregisterResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->modified);
        $this->assertSame('API key revoked', $response->note);
    }

    public function test_handles_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'modified' => 'N',
            ],
        ];

        $response = UnregisterResponse::fromArray(data: $data);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertFalse($response->modified);
        $this->assertNull($response->note);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'modified' => 'Y',
                    'note' => 'Success',
                ],
            ],
            headers: ['Content-Type' => ['application/json']],
            rawBody: 'test body',
        );

        $response = UnregisterResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }

    public function test_real_api_response(): void
    {
        // Real API response from production
        $data = [
            'api_version' => '1.2',
            'current_time' => '2025-11-09 12:09:36',
            'result' => 'success',
            'data' => [
                'modified' => 'Y',
                'note' => 'Der API-Schlüssel wurde gelöscht.',
            ],
        ];

        $response = UnregisterResponse::fromArray(data: $data);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->modified);
        $this->assertSame('Der API-Schlüssel wurde gelöscht.', $response->note);
    }
}
