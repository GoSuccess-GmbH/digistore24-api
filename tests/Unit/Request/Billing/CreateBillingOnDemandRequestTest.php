<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Billing;

use GoSuccess\Digistore24\Api\Request\Billing\CreateBillingOnDemandRequest;
use PHPUnit\Framework\TestCase;

final class CreateBillingOnDemandRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateBillingOnDemandRequest(
            purchaseId: 'P12345',
            productId: '67890'
        );
        
        $this->assertInstanceOf(CreateBillingOnDemandRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateBillingOnDemandRequest(
            purchaseId: 'P12345',
            productId: '67890'
        );
        
        $this->assertSame('createBillingOnDemand', $request->getEndpoint());
    }

    public function test_to_array_includes_required_data(): void
    {
        $request = new CreateBillingOnDemandRequest(
            purchaseId: 'P12345',
            productId: '67890'
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertSame('67890', $array['product_id']);
    }

    public function test_to_array_includes_optional_data(): void
    {
        $request = new CreateBillingOnDemandRequest(
            purchaseId: 'P12345',
            productId: '67890',
            paymentPlan: ['first_amount' => 10.00, 'currency' => 'EUR'],
            tracking: ['custom' => 'test123'],
            placeholders: ['title' => 'Custom Title'],
            settings: ['quantity' => 2],
            addons: [['product_id' => '999']]
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertArrayHasKey('payment_plan', $array);
        $this->assertArrayHasKey('tracking', $array);
        $this->assertArrayHasKey('placeholders', $array);
        $this->assertArrayHasKey('settings', $array);
        $this->assertArrayHasKey('addons', $array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreateBillingOnDemandRequest(
            purchaseId: 'P12345',
            productId: '67890'
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

