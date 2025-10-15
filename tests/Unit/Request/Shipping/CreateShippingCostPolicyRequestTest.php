<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Shipping;

use GoSuccess\Digistore24\Api\Request\Shipping\CreateShippingCostPolicyRequest;
use PHPUnit\Framework\TestCase;

final class CreateShippingCostPolicyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateShippingCostPolicyRequest(data: ['name' => 'Standard Shipping']);
        
        $this->assertInstanceOf(CreateShippingCostPolicyRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateShippingCostPolicyRequest(data: ['name' => 'Standard Shipping']);
        
        $this->assertSame('/createShippingCostPolicy', $request->getEndpoint());
    }

    public function test_to_array_includes_data(): void
    {
        $request = new CreateShippingCostPolicyRequest(data: ['name' => 'Standard Shipping', 'cost' => 5.99]);
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('Standard Shipping', $array['name']);
        $this->assertSame(5.99, $array['cost']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreateShippingCostPolicyRequest(data: ['name' => 'Standard Shipping']);
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

