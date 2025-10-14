<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\RefundPurchaseRequest;
use PHPUnit\Framework\TestCase;

final class RefundPurchaseRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RefundPurchaseRequest(purchaseId: 'P12345');
        
        $this->assertInstanceOf(RefundPurchaseRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new RefundPurchaseRequest(purchaseId: 'P12345');
        
        $this->assertSame('/refundPurchase', $request->getEndpoint());
    }

    public function test_to_array_includes_purchase_id_and_force(): void
    {
        $request = new RefundPurchaseRequest(purchaseId: 'P12345', force: true);
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertTrue($array['force']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new RefundPurchaseRequest(purchaseId: 'P12345');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

