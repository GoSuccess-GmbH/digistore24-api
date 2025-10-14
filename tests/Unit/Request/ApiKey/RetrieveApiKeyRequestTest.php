<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ApiKey;

use GoSuccess\Digistore24\Api\Request\ApiKey\RetrieveApiKeyRequest;
use PHPUnit\Framework\TestCase;

final class RetrieveApiKeyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RetrieveApiKeyRequest(
            email: 'test@example.com',
            token: 'abc123token'
        );
        
        $this->assertInstanceOf(RetrieveApiKeyRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new RetrieveApiKeyRequest(
            email: 'test@example.com',
            token: 'abc123token'
        );
        
        $this->assertSame('retrieveApiKey', $request->getEndpoint());
    }

    public function test_to_array_includes_all_data(): void
    {
        $request = new RetrieveApiKeyRequest(
            email: 'test@example.com',
            token: 'abc123token'
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('test@example.com', $array['email']);
        $this->assertSame('abc123token', $array['token']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new RetrieveApiKeyRequest(
            email: 'test@example.com',
            token: 'abc123token'
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

