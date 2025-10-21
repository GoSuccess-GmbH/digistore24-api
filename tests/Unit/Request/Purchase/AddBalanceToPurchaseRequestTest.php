<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\AddBalanceToPurchaseRequest;
use PHPUnit\Framework\TestCase;

final class AddBalanceToPurchaseRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new AddBalanceToPurchaseRequest(purchaseId: 'P12345', amount: 50.00);

        $this->assertInstanceOf(AddBalanceToPurchaseRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new AddBalanceToPurchaseRequest(purchaseId: 'P12345', amount: 50.00);

        $this->assertSame('/addBalanceToPurchase', $request->getEndpoint());
    }

    public function test_to_array_includes_purchase_id_and_amount(): void
    {
        $request = new AddBalanceToPurchaseRequest(purchaseId: 'P12345', amount: 50.00);

        $array = $request->toArray();
        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertSame(50.00, $array['amount']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new AddBalanceToPurchaseRequest(purchaseId: 'P12345', amount: 50.00);

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
