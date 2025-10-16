<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Delivery;

use GoSuccess\Digistore24\Api\Request\Delivery\GetDeliveryRequest;
use PHPUnit\Framework\TestCase;

final class GetDeliveryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetDeliveryRequest(deliveryId: 'D12345');

        $this->assertInstanceOf(GetDeliveryRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetDeliveryRequest(deliveryId: 'D12345');

        $this->assertSame('/getDelivery', $request->getEndpoint());
    }

    public function test_to_array_includes_delivery_id(): void
    {
        $request = new GetDeliveryRequest(deliveryId: 'D12345');

        $array = $request->toArray();        $this->assertSame('D12345', $array['delivery_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetDeliveryRequest(deliveryId: 'D12345');

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
