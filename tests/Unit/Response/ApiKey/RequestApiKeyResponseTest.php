<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ApiKey;

use GoSuccess\Digistore24\Api\Response\ApiKey\RequestApiKeyResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class RequestApiKeyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = RequestApiKeyResponse::fromArray($data);
        
        $this->assertInstanceOf(RequestApiKeyResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = RequestApiKeyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(RequestApiKeyResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = RequestApiKeyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

