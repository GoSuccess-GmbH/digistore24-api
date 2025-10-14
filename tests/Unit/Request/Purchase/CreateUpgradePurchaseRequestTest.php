<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\CreateUpgradePurchaseRequest;
use PHPUnit\Framework\TestCase;

final class CreateUpgradePurchaseRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateUpgradePurchaseRequest();
        $this->assertInstanceOf(CreateUpgradePurchaseRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreateUpgradePurchaseRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreateUpgradePurchaseRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreateUpgradePurchaseRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

