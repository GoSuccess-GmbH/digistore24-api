<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Shipping;

use GoSuccess\Digistore24\Api\Request\Shipping\DeleteShippingCostPolicyRequest;
use PHPUnit\Framework\TestCase;

final class DeleteShippingCostPolicyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeleteShippingCostPolicyRequest();
        $this->assertInstanceOf(DeleteShippingCostPolicyRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new DeleteShippingCostPolicyRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new DeleteShippingCostPolicyRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new DeleteShippingCostPolicyRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

