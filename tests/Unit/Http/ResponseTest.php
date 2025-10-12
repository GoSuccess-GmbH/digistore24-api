<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Tests\Unit\Http;

use GoSuccess\Digistore24\Http\Response;
use GoSuccess\Digistore24\Http\StatusCode;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GoSuccess\Digistore24\Http\Response
 */
final class ResponseTest extends TestCase
{
    public function testIsSuccessPropertyReturnsTrueFor2xxStatus(): void
    {
        $response = new Response(
            statusCode: 200,
            data: [],
            headers: []
        );

        $this->assertTrue($response->isSuccess);
    }

    public function testIsSuccessPropertyReturnsFalseForNon2xxStatus(): void
    {
        $response = new Response(
            statusCode: 400,
            data: [],
            headers: []
        );

        $this->assertFalse($response->isSuccess);
    }

    public function testIsClientErrorPropertyReturnsTrueFor4xxStatus(): void
    {
        $response = new Response(
            statusCode: 404,
            data: [],
            headers: []
        );

        $this->assertTrue($response->isClientError);
    }

    public function testIsServerErrorPropertyReturnsTrueFor5xxStatus(): void
    {
        $response = new Response(
            statusCode: 500,
            data: [],
            headers: []
        );

        $this->assertTrue($response->isServerError);
    }

    public function testConstructorSetsAllProperties(): void
    {
        $data = ['key' => 'value'];
        $headers = ['Content-Type' => ['application/json']];

        $response = new Response(
            statusCode: 200,
            data: $data,
            headers: $headers
        );

        $this->assertSame(200, $response->statusCode);
        $this->assertSame(StatusCode::OK, $response->status);
        $this->assertSame($data, $response->data);
        $this->assertSame($headers, $response->headers);
    }

    public function testResponseDataCanBeAccessed(): void
    {
        $response = new Response(
            statusCode: 200,
            data: [
                'user' => ['name' => 'John', 'email' => 'john@example.com'],
                'status' => 'success'
            ],
            headers: []
        );

        $this->assertSame('John', $response->data['user']['name']);
        $this->assertSame('success', $response->data['status']);
    }

    public function testStatusPropertyIsComputed(): void
    {
        $response = new Response(statusCode: 201, data: [], headers: []);
        $this->assertSame(StatusCode::CREATED, $response->status);

        $response = new Response(statusCode: 404, data: [], headers: []);
        $this->assertSame(StatusCode::NOT_FOUND, $response->status);
    }
}
