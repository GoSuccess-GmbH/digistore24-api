<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Shipping;

use GoSuccess\Digistore24\Api\Request\Shipping\UpdateShippingCostPolicyRequest;
use PHPUnit\Framework\TestCase;

final class UpdateShippingCostPolicyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateShippingCostPolicyRequest();
        $this->assertInstanceOf(UpdateShippingCostPolicyRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdateShippingCostPolicyRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdateShippingCostPolicyRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdateShippingCostPolicyRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

