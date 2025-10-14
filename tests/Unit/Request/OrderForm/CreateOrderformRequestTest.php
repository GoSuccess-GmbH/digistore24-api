<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\OrderForm;

use GoSuccess\Digistore24\Api\Request\OrderForm\CreateOrderformRequest;
use PHPUnit\Framework\TestCase;

final class CreateOrderformRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateOrderformRequest(data: ['name' => 'Test Form']);
        
        $this->assertInstanceOf(CreateOrderformRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateOrderformRequest(data: ['name' => 'Test Form']);
        
        $this->assertSame('createOrderform', $request->getEndpoint());
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreateOrderformRequest(data: ['name' => 'Test Form']);
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

