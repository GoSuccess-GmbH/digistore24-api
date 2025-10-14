<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\System;

use GoSuccess\Digistore24\Api\Response\System\GetGlobalSettingsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetGlobalSettingsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = GetGlobalSettingsResponse::fromArray($data);
        
        $this->assertInstanceOf(GetGlobalSettingsResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = GetGlobalSettingsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetGlobalSettingsResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetGlobalSettingsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

