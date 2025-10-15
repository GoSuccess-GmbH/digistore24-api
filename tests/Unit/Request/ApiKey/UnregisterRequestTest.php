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

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UnregisterRequest();
        
        $this->assertSame('/unregister', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new UnregisterRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UnregisterRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

