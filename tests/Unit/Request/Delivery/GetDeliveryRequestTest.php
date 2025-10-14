<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Delivery;

use GoSuccess\Digistore24\Api\Request\Delivery\GetDeliveryRequest;
use PHPUnit\Framework\TestCase;

final class GetDeliveryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetDeliveryRequest();
        $this->assertInstanceOf(GetDeliveryRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetDeliveryRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetDeliveryRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetDeliveryRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

