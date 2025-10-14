<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Tracking;

use GoSuccess\Digistore24\Api\Request\Tracking\RenderJsTrackingCodeRequest;
use PHPUnit\Framework\TestCase;

final class RenderJsTrackingCodeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RenderJsTrackingCodeRequest();
        $this->assertInstanceOf(RenderJsTrackingCodeRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new RenderJsTrackingCodeRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new RenderJsTrackingCodeRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new RenderJsTrackingCodeRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

