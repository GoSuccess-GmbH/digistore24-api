<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Delivery;

use GoSuccess\Digistore24\Api\DataTransferObject\DeliveryData;
use GoSuccess\Digistore24\Api\Request\Delivery\UpdateDeliveryRequest;
use PHPUnit\Framework\TestCase;

final class UpdateDeliveryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $delivery = new DeliveryData();
        $delivery->type = 'delivery';
        
        $request = new UpdateDeliveryRequest(
            deliveryId: 'D12345',
            delivery: $delivery
        );
        
        $this->assertInstanceOf(UpdateDeliveryRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $delivery = new DeliveryData();
        $delivery->type = 'delivery';
        
        $request = new UpdateDeliveryRequest(
            deliveryId: 'D12345',
            delivery: $delivery
        );
        
        $this->assertSame('/updateDelivery', $request->getEndpoint());
    }

    public function test_to_array_includes_delivery_id_and_data(): void
    {
        $delivery = new DeliveryData();
        $delivery->type = 'delivery';
        $delivery->isShipped = true;
        
        $request = new UpdateDeliveryRequest(
            deliveryId: 'D12345',
            delivery: $delivery
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('D12345', $array['delivery_id']);
        $this->assertSame('delivery', $array['type']);
        $this->assertSame('Y', $array['is_shipped']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $delivery = new DeliveryData();
        $delivery->type = 'delivery';
        
        $request = new UpdateDeliveryRequest(
            deliveryId: 'D12345',
            delivery: $delivery
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

