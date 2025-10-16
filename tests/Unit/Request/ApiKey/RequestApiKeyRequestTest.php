<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ApiKey;

use GoSuccess\Digistore24\Api\Request\ApiKey\RequestApiKeyRequest;
use PHPUnit\Framework\TestCase;

final class RequestApiKeyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RequestApiKeyRequest(email: 'test@example.com');

        $this->assertInstanceOf(RequestApiKeyRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new RequestApiKeyRequest(email: 'test@example.com');

        $this->assertSame('/requestApiKey', $request->getEndpoint());
    }

    public function test_to_array_includes_email(): void
    {
        $request = new RequestApiKeyRequest(email: 'test@example.com');

        $array = $request->toArray();        $this->assertSame('test@example.com', $array['email']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new RequestApiKeyRequest(email: 'test@example.com');

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
