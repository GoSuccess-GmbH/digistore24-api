<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\OrderForm;

use GoSuccess\Digistore24\Api\Request\OrderForm\CreateOrderformRequest;
use PHPUnit\Framework\TestCase;

final class CreateOrderformRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateOrderformRequest();
        $this->assertInstanceOf(CreateOrderformRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreateOrderformRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreateOrderformRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreateOrderformRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

