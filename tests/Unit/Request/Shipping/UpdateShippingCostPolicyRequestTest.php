<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Shipping;

use GoSuccess\Digistore24\Api\DataTransferObject\ShippingCostPolicyData;
use GoSuccess\Digistore24\Api\Request\Shipping\UpdateShippingCostPolicyRequest;
use PHPUnit\Framework\TestCase;

final class UpdateShippingCostPolicyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $policy = new ShippingCostPolicyData();
        $policy->name = 'Updated Shipping';

        $request = new UpdateShippingCostPolicyRequest(
            shippingCostPolicyId: 'SCP123',
            policy: $policy,
        );

        $this->assertInstanceOf(UpdateShippingCostPolicyRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $policy = new ShippingCostPolicyData();
        $policy->name = 'Updated Shipping';

        $request = new UpdateShippingCostPolicyRequest(
            shippingCostPolicyId: 'SCP123',
            policy: $policy,
        );

        $this->assertSame('/updateShippingCostPolicy', $request->getEndpoint());
    }

    public function test_to_array_includes_id_and_data(): void
    {
        $policy = new ShippingCostPolicyData();
        $policy->name = 'Updated Shipping';

        $request = new UpdateShippingCostPolicyRequest(
            shippingCostPolicyId: 'SCP123',
            policy: $policy,
        );

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('SCP123', $array['shipping_cost_policy_id']);
        $this->assertSame('Updated Shipping', $array['name']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $policy = new ShippingCostPolicyData();
        $policy->name = 'Updated Shipping';

        $request = new UpdateShippingCostPolicyRequest(
            shippingCostPolicyId: 'SCP123',
            policy: $policy,
        );

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
