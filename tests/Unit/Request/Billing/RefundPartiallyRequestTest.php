<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Billing;

use GoSuccess\Digistore24\Api\Request\Billing\RefundPartiallyRequest;
use PHPUnit\Framework\TestCase;

final class RefundPartiallyRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RefundPartiallyRequest(
            purchaseId: 'P12345',
            amount: 15.50
        );
        
        $this->assertInstanceOf(RefundPartiallyRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new RefundPartiallyRequest(
            purchaseId: 'P12345',
            amount: 15.50
        );
        
        $this->assertSame('/refundPartially', $request->getEndpoint());
    }

    public function test_to_array_includes_all_data(): void
    {
        $request = new RefundPartiallyRequest(
            purchaseId: 'P12345',
            amount: 15.50
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertSame(15.50, $array['amount']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new RefundPartiallyRequest(
            purchaseId: 'P12345',
            amount: 15.50
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

