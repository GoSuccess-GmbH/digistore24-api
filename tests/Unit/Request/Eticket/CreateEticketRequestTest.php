<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Eticket;

use GoSuccess\Digistore24\Api\Request\Eticket\CreateEticketRequest;
use PHPUnit\Framework\TestCase;

final class CreateEticketRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateEticketRequest();
        $this->assertInstanceOf(CreateEticketRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreateEticketRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreateEticketRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreateEticketRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

