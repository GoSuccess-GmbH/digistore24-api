<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\OrderForm;

use GoSuccess\Digistore24\Api\Request\OrderForm\DeleteOrderformRequest;
use PHPUnit\Framework\TestCase;

final class DeleteOrderformRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeleteOrderformRequest();
        $this->assertInstanceOf(DeleteOrderformRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new DeleteOrderformRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new DeleteOrderformRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new DeleteOrderformRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

