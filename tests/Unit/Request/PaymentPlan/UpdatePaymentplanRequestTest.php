<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Request\PaymentPlan\UpdatePaymentplanRequest;
use PHPUnit\Framework\TestCase;

final class UpdatePaymentplanRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdatePaymentplanRequest(
            paymentplanId: 'PP123',
            data: ['name' => 'Updated Plan']
        );
        
        $this->assertInstanceOf(UpdatePaymentplanRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UpdatePaymentplanRequest(
            paymentplanId: 'PP123',
            data: ['name' => 'Updated Plan']
        );
        
        $this->assertSame('/updatePaymentplan', $request->getEndpoint());
    }

    public function test_to_array_includes_paymentplan_id_and_data(): void
    {
        $request = new UpdatePaymentplanRequest(
            paymentplanId: 'PP123',
            data: ['name' => 'Updated Plan', 'price' => 29.99]
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('PP123', $array['paymentplan_id']);
        $this->assertSame('Updated Plan', $array['name']);
        $this->assertSame(29.99, $array['price']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UpdatePaymentplanRequest(
            paymentplanId: 'PP123',
            data: ['name' => 'Updated Plan']
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

