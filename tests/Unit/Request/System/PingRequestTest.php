<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\System;

use GoSuccess\Digistore24\Api\Request\System\PingRequest;
use PHPUnit\Framework\TestCase;

final class PingRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new PingRequest();
        
        $this->assertInstanceOf(PingRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new PingRequest();
        
        $this->assertSame('/ping', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new PingRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new PingRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

