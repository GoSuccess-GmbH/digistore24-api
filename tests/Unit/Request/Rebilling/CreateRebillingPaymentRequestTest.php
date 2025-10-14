<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Rebilling;

use GoSuccess\Digistore24\Api\Request\Rebilling\CreateRebillingPaymentRequest;
use PHPUnit\Framework\TestCase;

final class CreateRebillingPaymentRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateRebillingPaymentRequest(purchaseId: 'P12345');
        
        $this->assertInstanceOf(CreateRebillingPaymentRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateRebillingPaymentRequest(purchaseId: 'P12345');
        
        $this->assertSame('createRebillingPayment', $request->getEndpoint());
    }

    public function test_to_array_includes_purchase_id_and_data(): void
    {
        $request = new CreateRebillingPaymentRequest(purchaseId: 'P12345', data: ['amount' => 29.99]);
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertSame(29.99, $array['amount']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreateRebillingPaymentRequest(purchaseId: 'P12345');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

