<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Delivery;

use GoSuccess\Digistore24\Api\Request\Delivery\UpdateDeliveryRequest;
use PHPUnit\Framework\TestCase;

final class UpdateDeliveryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateDeliveryRequest();
        $this->assertInstanceOf(UpdateDeliveryRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdateDeliveryRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdateDeliveryRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdateDeliveryRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

