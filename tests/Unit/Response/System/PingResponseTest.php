<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\System;

use GoSuccess\Digistore24\Api\Response\System\PingResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class PingResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'server_time' => '2024-01-15 10:30:45',
            ],
        ];
        $response = PingResponse::fromArray($data);
        
        $this->assertInstanceOf(PingResponse::class, $response);
        $this->assertSame('success', $response->getResult());
        $this->assertSame('2024-01-15 10:30:45', $response->getServerTime());
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'ok',
                'data' => [
                    'server_time' => '2024-02-01 14:20:30',
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = PingResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(PingResponse::class, $response);
        $this->assertSame('ok', $response->getResult());
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'server_time' => '2024-01-01 00:00:00',
                ],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = PingResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

