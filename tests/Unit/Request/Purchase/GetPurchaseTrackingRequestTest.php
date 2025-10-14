<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\GetPurchaseTrackingRequest;
use PHPUnit\Framework\TestCase;

final class GetPurchaseTrackingRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetPurchaseTrackingRequest();
        $this->assertInstanceOf(GetPurchaseTrackingRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetPurchaseTrackingRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetPurchaseTrackingRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetPurchaseTrackingRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

