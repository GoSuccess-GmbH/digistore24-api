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
        $data = ['result' => 'success'];
        $response = UnregisterResponse::fromArray($data);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertSame('success', $response->getResult());
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success'],
            headers: [],
            rawBody: '',
        );

        $response = UnregisterResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(UnregisterResponse::class, $response);
        $this->assertSame('success', $response->getResult());
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success'],
            headers: [],
            rawBody: 'test',
        );

        $response = UnregisterResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
