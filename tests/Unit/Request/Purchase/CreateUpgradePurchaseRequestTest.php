<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\CreateUpgradePurchaseRequest;
use PHPUnit\Framework\TestCase;

final class CreateUpgradePurchaseRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateUpgradePurchaseRequest(purchaseIds: 'P12345', upgradeId: 'U123');

        $this->assertInstanceOf(CreateUpgradePurchaseRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateUpgradePurchaseRequest(purchaseIds: 'P12345', upgradeId: 'U123');

        $this->assertSame('/createUpgradePurchase', $request->getEndpoint());
    }

    public function test_to_array_includes_purchase_ids_and_upgrade_id(): void
    {
        $request = new CreateUpgradePurchaseRequest(purchaseIds: 'P12345', upgradeId: 'U123');

        $array = $request->toArray();        $this->assertSame('P12345', $array['purchase_ids']);
        $this->assertSame('U123', $array['upgrade_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreateUpgradePurchaseRequest(purchaseIds: 'P12345', upgradeId: 'U123');

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
