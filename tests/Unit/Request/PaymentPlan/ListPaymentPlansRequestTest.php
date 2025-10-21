<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Request\PaymentPlan\ListPaymentPlansRequest;
use PHPUnit\Framework\TestCase;

final class ListPaymentPlansRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListPaymentPlansRequest();

        $this->assertInstanceOf(ListPaymentPlansRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListPaymentPlansRequest();

        $this->assertSame('/listPaymentPlans', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListPaymentPlansRequest();

        $array = $request->toArray();
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListPaymentPlansRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
