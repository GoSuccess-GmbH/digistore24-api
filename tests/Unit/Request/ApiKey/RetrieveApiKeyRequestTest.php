<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ApiKey;

use GoSuccess\Digistore24\Api\Request\ApiKey\RetrieveApiKeyRequest;
use PHPUnit\Framework\TestCase;

final class RetrieveApiKeyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RetrieveApiKeyRequest();
        $this->assertInstanceOf(RetrieveApiKeyRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new RetrieveApiKeyRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new RetrieveApiKeyRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new RetrieveApiKeyRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

