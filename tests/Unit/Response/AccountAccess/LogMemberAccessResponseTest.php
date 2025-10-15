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
        $data = [
            'success' => true,
            'message' => 'Access logged successfully'
        ];
        $response = LogMemberAccessResponse::fromArray($data);
        
        $this->assertInstanceOf(LogMemberAccessResponse::class, $response);
        $this->assertTrue($response->success);
        $this->assertSame('Access logged successfully', $response->message);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'success' => true,
                'message' => 'Member access recorded'
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = LogMemberAccessResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(LogMemberAccessResponse::class, $response);
        $this->assertTrue($response->success);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = LogMemberAccessResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

