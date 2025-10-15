<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Delivery;

use GoSuccess\Digistore24\Api\Request\Delivery\ListDeliveriesRequest;
use PHPUnit\Framework\TestCase;

final class ListDeliveriesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListDeliveriesRequest();
        
        $this->assertInstanceOf(ListDeliveriesRequest::class, $request);
    }

    public function test_can_create_instance_with_purchase_id(): void
    {
        $request = new ListDeliveriesRequest(purchaseId: 'P12345');
        
        $this->assertInstanceOf(ListDeliveriesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListDeliveriesRequest();
        
        $this->assertSame('/listDeliveries', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array_without_purchase_id(): void
    {
        $request = new ListDeliveriesRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_to_array_includes_purchase_id_when_set(): void
    {
        $request = new ListDeliveriesRequest(purchaseId: 'P12345');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListDeliveriesRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

