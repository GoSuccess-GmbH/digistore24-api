<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Shipping;

use GoSuccess\Digistore24\Api\Request\Shipping\CreateShippingCostPolicyRequest;
use PHPUnit\Framework\TestCase;

final class CreateShippingCostPolicyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateShippingCostPolicyRequest();
        $this->assertInstanceOf(CreateShippingCostPolicyRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreateShippingCostPolicyRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreateShippingCostPolicyRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreateShippingCostPolicyRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

