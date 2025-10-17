<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Request\PaymentPlan\DeletePaymentplanRequest;
use PHPUnit\Framework\TestCase;

final class DeletePaymentplanRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeletePaymentplanRequest(paymentplanId: 'PP123');

        $this->assertInstanceOf(DeletePaymentplanRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new DeletePaymentplanRequest(paymentplanId: 'PP123');

        $this->assertSame('/deletePaymentplan', $request->getEndpoint());
    }

    public function test_to_array_includes_paymentplan_id(): void
    {
        $request = new DeletePaymentplanRequest(paymentplanId: 'PP123');

        $array = $request->toArray();
        $this->assertSame('PP123', $array['paymentplan_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new DeletePaymentplanRequest(paymentplanId: 'PP123');

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
