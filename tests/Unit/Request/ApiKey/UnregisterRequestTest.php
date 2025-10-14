<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ApiKey;

use GoSuccess\Digistore24\Api\Request\ApiKey\UnregisterRequest;
use PHPUnit\Framework\TestCase;

final class UnregisterRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UnregisterRequest();
        $this->assertInstanceOf(UnregisterRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UnregisterRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UnregisterRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UnregisterRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

