<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\AccountAccess;

use GoSuccess\Digistore24\Api\Response\AccountAccess\LogMemberAccessResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class LogMemberAccessResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = LogMemberAccessResponse::fromArray($data);
        
        $this->assertInstanceOf(LogMemberAccessResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = LogMemberAccessResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(LogMemberAccessResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = LogMemberAccessResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

