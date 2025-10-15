<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\Api\DataTransferObject\AddonData;
use PHPUnit\Framework\TestCase;

final class AddonDataTest extends TestCase
{
    public function testCanCreateWithRequiredFields(): void
    {
        $addon = new AddonData(productId: 12345);

        $this->assertSame(12345, $addon->productId);
        $this->assertNull($addon->amount);
        $this->assertSame(1, $addon->quantity);
        $this->assertFalse($addon->isQuantityEditableAfterPurchase);
    }

    public function testCanCreateWithAllFields(): void
    {
        $addon = new AddonData(
            productId: 12345,
            amount: 29.99,
            quantity: 3,
            isQuantityEditableAfterPurchase: true,
        );

        $this->assertSame(12345, $addon->productId);
        $this->assertSame(29.99, $addon->amount);
        $this->assertSame(3, $addon->quantity);
        $this->assertTrue($addon->isQuantityEditableAfterPurchase);
    }

    public function testQuantityMustBeAtLeastOne(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantity must be at least 1');

        new AddonData(productId: 12345, quantity: 0);
    }

    public function testToArrayWithMinimalData(): void
    {
        $addon = new AddonData(productId: 12345);
        $array = $addon->toArray();

        $this->assertSame(12345, $array['product_id']);
        $this->assertSame(1, $array['quantity']);
        $this->assertSame('N', $array['is_quantity_editable_after_purchase']);
        $this->assertArrayNotHasKey('amount', $array);
    }

    public function testToArrayWithAllData(): void
    {
        $addon = new AddonData(
            productId: 12345,
            amount: 29.99,
            quantity: 2,
            isQuantityEditableAfterPurchase: true,
        );
        $array = $addon->toArray();

        $this->assertSame(12345, $array['product_id']);
        $this->assertSame(29.99, $array['amount']);
        $this->assertSame(2, $array['quantity']);
        $this->assertSame('Y', $array['is_quantity_editable_after_purchase']);
    }

    public function testIsQuantityEditableConvertsToYN(): void
    {
        $addonYes = new AddonData(productId: 12345, isQuantityEditableAfterPurchase: true);
        $addonNo = new AddonData(productId: 12345, isQuantityEditableAfterPurchase: false);

        $this->assertSame('Y', $addonYes->toArray()['is_quantity_editable_after_purchase']);
        $this->assertSame('N', $addonNo->toArray()['is_quantity_editable_after_purchase']);
    }
}
