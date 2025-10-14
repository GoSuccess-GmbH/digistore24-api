<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ApiKey;

use GoSuccess\Digistore24\Api\Request\ApiKey\RequestApiKeyRequest;
use PHPUnit\Framework\TestCase;

final class RequestApiKeyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RequestApiKeyRequest();
        $this->assertInstanceOf(RequestApiKeyRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new RequestApiKeyRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new RequestApiKeyRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new RequestApiKeyRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

