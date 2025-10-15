<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Shipping;

use GoSuccess\Digistore24\Api\Request\Shipping\UpdateShippingCostPolicyRequest;
use PHPUnit\Framework\TestCase;

final class UpdateShippingCostPolicyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateShippingCostPolicyRequest(
            shippingCostPolicyId: 'SCP123',
            data: ['name' => 'Updated Shipping']
        );
        
        $this->assertInstanceOf(UpdateShippingCostPolicyRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UpdateShippingCostPolicyRequest(
            shippingCostPolicyId: 'SCP123',
            data: ['name' => 'Updated Shipping']
        );
        
        $this->assertSame('/updateShippingCostPolicy', $request->getEndpoint());
    }

    public function test_to_array_includes_id_and_data(): void
    {
        $request = new UpdateShippingCostPolicyRequest(
            shippingCostPolicyId: 'SCP123',
            data: ['name' => 'Updated Shipping', 'cost' => 7.99]
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('SCP123', $array['shipping_cost_policy_id']);
        $this->assertSame('Updated Shipping', $array['name']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UpdateShippingCostPolicyRequest(
            shippingCostPolicyId: 'SCP123',
            data: ['name' => 'Updated Shipping']
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

