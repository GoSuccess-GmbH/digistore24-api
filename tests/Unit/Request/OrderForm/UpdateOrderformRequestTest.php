<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\OrderForm;

use GoSuccess\Digistore24\Api\DTO\OrderFormData;
use GoSuccess\Digistore24\Api\Request\OrderForm\UpdateOrderformRequest;
use PHPUnit\Framework\TestCase;

final class UpdateOrderformRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $form = new OrderFormData();
        $form->name = 'Updated Form';

        $request = new UpdateOrderformRequest(
            orderformId: 'OF123',
            orderForm: $form,
        );

        $this->assertInstanceOf(UpdateOrderformRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $form = new OrderFormData();
        $form->name = 'Updated Form';

        $request = new UpdateOrderformRequest(
            orderformId: 'OF123',
            orderForm: $form,
        );

        $this->assertSame('/updateOrderform', $request->getEndpoint());
    }

    public function test_validate_returns_empty_array(): void
    {
        $form = new OrderFormData();
        $form->name = 'Updated Form';

        $request = new UpdateOrderformRequest(
            orderformId: 'OF123',
            orderForm: $form,
        );

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
