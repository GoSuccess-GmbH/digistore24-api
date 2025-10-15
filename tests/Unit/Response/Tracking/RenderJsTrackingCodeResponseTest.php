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
        $data = [
            'result' => 'success',
            'data' => [
                'script_code' => '<script src="https://digistore24.com/tracking.js"></script>',
                'script_url' => 'https://digistore24.com/tracking.js',
            ],
        ];
        $response = RenderJsTrackingCodeResponse::fromArray($data);
        
        $this->assertInstanceOf(RenderJsTrackingCodeResponse::class, $response);
        $this->assertSame('success', $response->getResult());
        $this->assertTrue($response->wasSuccessful());
        $this->assertStringContainsString('script', $response->getScriptCode());
        $this->assertSame('https://digistore24.com/tracking.js', $response->getScriptUrl());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'ok',
                'data' => [
                    'script_code' => '<script>console.log("tracking");</script>',
                    'script_url' => 'https://example.com/track.js',
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = RenderJsTrackingCodeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(RenderJsTrackingCodeResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertStringContainsString('console.log', $response->getScriptCode());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'script_code' => '',
                    'script_url' => '',
                ],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = RenderJsTrackingCodeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

