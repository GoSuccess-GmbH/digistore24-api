<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Shipping;

use GoSuccess\Digistore24\Api\Request\Shipping\GetShippingCostPolicyRequest;
use PHPUnit\Framework\TestCase;

final class GetShippingCostPolicyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetShippingCostPolicyRequest(shippingCostPolicyId: 'SCP123');
        
        $this->assertInstanceOf(GetShippingCostPolicyRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetShippingCostPolicyRequest(shippingCostPolicyId: 'SCP123');
        
        $this->assertSame('/getShippingCostPolicy', $request->getEndpoint());
    }

    public function test_to_array_includes_shipping_cost_policy_id(): void
    {
        $request = new GetShippingCostPolicyRequest(shippingCostPolicyId: 'SCP123');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('SCP123', $array['shipping_cost_policy_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetShippingCostPolicyRequest(shippingCostPolicyId: 'SCP123');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

