<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Shipping;

use GoSuccess\Digistore24\Api\Request\Shipping\ListShippingCostPoliciesRequest;
use PHPUnit\Framework\TestCase;

final class ListShippingCostPoliciesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListShippingCostPoliciesRequest();

        $this->assertInstanceOf(ListShippingCostPoliciesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListShippingCostPoliciesRequest();

        $this->assertSame('/listShippingCostPolicies', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListShippingCostPoliciesRequest();

        $array = $request->toArray();        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListShippingCostPoliciesRequest();

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
