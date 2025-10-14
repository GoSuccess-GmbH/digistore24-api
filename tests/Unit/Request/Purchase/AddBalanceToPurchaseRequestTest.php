<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\AddBalanceToPurchaseRequest;
use PHPUnit\Framework\TestCase;

final class AddBalanceToPurchaseRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new AddBalanceToPurchaseRequest();
        $this->assertInstanceOf(AddBalanceToPurchaseRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new AddBalanceToPurchaseRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new AddBalanceToPurchaseRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new AddBalanceToPurchaseRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

