<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\OrderForm;

use GoSuccess\Digistore24\Api\Request\OrderForm\DeleteOrderformRequest;
use PHPUnit\Framework\TestCase;

final class DeleteOrderformRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeleteOrderformRequest(orderformId: 'OF123');

        $this->assertInstanceOf(DeleteOrderformRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new DeleteOrderformRequest(orderformId: 'OF123');

        $this->assertSame('/deleteOrderform', $request->getEndpoint());
    }

    public function test_to_array_includes_orderform_id(): void
    {
        $request = new DeleteOrderformRequest(orderformId: 'OF123');

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('OF123', $array['orderform_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new DeleteOrderformRequest(orderformId: 'OF123');

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
