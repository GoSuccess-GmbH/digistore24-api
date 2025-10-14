<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\UpdatePurchaseRequest;
use PHPUnit\Framework\TestCase;

final class UpdatePurchaseRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdatePurchaseRequest();
        $this->assertInstanceOf(UpdatePurchaseRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdatePurchaseRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdatePurchaseRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdatePurchaseRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

