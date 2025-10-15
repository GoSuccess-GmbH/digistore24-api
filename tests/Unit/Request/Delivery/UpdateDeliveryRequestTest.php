<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Delivery;

use GoSuccess\Digistore24\Api\Request\Delivery\UpdateDeliveryRequest;
use PHPUnit\Framework\TestCase;

final class UpdateDeliveryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateDeliveryRequest(
            deliveryId: 'D12345',
            data: ['status' => 'shipped']
        );
        
        $this->assertInstanceOf(UpdateDeliveryRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UpdateDeliveryRequest(
            deliveryId: 'D12345',
            data: ['status' => 'shipped']
        );
        
        $this->assertSame('/updateDelivery', $request->getEndpoint());
    }

    public function test_to_array_includes_delivery_id_and_data(): void
    {
        $request = new UpdateDeliveryRequest(
            deliveryId: 'D12345',
            data: ['status' => 'shipped', 'tracking_number' => 'TRACK123']
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('D12345', $array['delivery_id']);
        $this->assertSame('shipped', $array['status']);
        $this->assertSame('TRACK123', $array['tracking_number']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UpdateDeliveryRequest(
            deliveryId: 'D12345',
            data: ['status' => 'shipped']
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

