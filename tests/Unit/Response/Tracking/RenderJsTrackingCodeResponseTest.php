<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Tracking;

use GoSuccess\Digistore24\Api\Response\Tracking\RenderJsTrackingCodeResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class RenderJsTrackingCodeResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = RenderJsTrackingCodeResponse::fromArray($data);
        
        $this->assertInstanceOf(RenderJsTrackingCodeResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = RenderJsTrackingCodeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(RenderJsTrackingCodeResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = RenderJsTrackingCodeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

