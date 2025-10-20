<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\System;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\System\PingResponse;
use PHPUnit\Framework\TestCase;

final class PingResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'api_version' => '1.2',
            'current_time' => '2024-01-15 10:30:45',
            'runtime_seconds' => 0.123,
            'result' => 'success',
            'data' => [
                'server_time' => '2024-01-15 10:30:45',
            ],
        ];

        $response = PingResponse::fromArray($data);

        $this->assertInstanceOf(PingResponse::class, $response);
        $this->assertSame('1.2', $response->apiVersion);
        $this->assertInstanceOf(DateTimeImmutable::class, $response->currentTime);
        $this->assertSame(0.123, $response->runtimeSeconds);
        $this->assertSame('success', $response->result);
        $this->assertInstanceOf(DateTimeImmutable::class, $response->serverTime);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'api_version' => '1.3',
                'current_time' => '2024-02-01 14:20:30',
                'runtime_seconds' => 0.456,
                'result' => 'ok',
                'data' => [
                    'server_time' => '2024-02-01 14:20:30',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = PingResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(PingResponse::class, $response);
        $this->assertSame('ok', $response->result);
        $this->assertSame('1.3', $response->apiVersion);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_handles_missing_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [],
        ];

        $response = PingResponse::fromArray($data);

        $this->assertSame('', $response->apiVersion);
        $this->assertNull($response->currentTime);
        $this->assertSame(0.0, $response->runtimeSeconds);
        $this->assertNull($response->serverTime);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'api_version' => '1.0',
                'data' => [
                    'server_time' => '2024-01-01 00:00:00',
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = PingResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
