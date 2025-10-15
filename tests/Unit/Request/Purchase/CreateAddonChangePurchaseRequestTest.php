<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\DTO\AddonData;
use GoSuccess\Digistore24\Api\DTO\PlaceholderData;
use GoSuccess\Digistore24\Api\DTO\TrackingData;
use GoSuccess\Digistore24\Api\Request\Purchase\CreateAddonChangePurchaseRequest;
use PHPUnit\Framework\TestCase;

final class CreateAddonChangePurchaseRequestTest extends TestCase
{
    public function testCanCreateWithRequiredFields(): void
    {
        $addon = new AddonData(productId: 12345);
        $request = new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [$addon],
        );

        $this->assertSame('P12345', $request->purchaseId);
        $this->assertCount(1, $request->addons);
        $this->assertNull($request->tracking);
        $this->assertNull($request->placeholders);
    }

    public function testCanCreateWithAllFields(): void
    {
        $addon = new AddonData(productId: 12345);
        $tracking = new TrackingData();
        $tracking->custom = 'ref-123';
        $placeholders = new PlaceholderData(['key' => 'value']);

        $request = new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [$addon],
            tracking: $tracking,
            placeholders: $placeholders,
        );

        $this->assertSame('P12345', $request->purchaseId);
        $this->assertSame($tracking, $request->tracking);
        $this->assertSame($placeholders, $request->placeholders);
    }

    public function testRequiresAtLeastOneAddon(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('At least one addon is required');

        new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [],
        );
    }

    public function testAddonsArrayMustContainAddonDataObjects(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('All addons must be instances of AddonData');

        new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: ['invalid'],
        );
    }

    public function testEndpointReturnsCorrectValue(): void
    {
        $addon = new AddonData(productId: 12345);
        $request = new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [$addon],
        );

        $this->assertSame('/createAddonChangePurchase', $request->getEndpoint());
    }

    public function testToArrayWithMinimalData(): void
    {
        $addon = new AddonData(productId: 12345, quantity: 2);
        $request = new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [$addon],
        );

        $array = $request->toArray();

        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertIsArray($array['addons']);
        $this->assertCount(1, $array['addons']);
        $this->assertSame(12345, $array['addons'][0]['product_id']);
        $this->assertArrayNotHasKey('tracking', $array);
        $this->assertArrayNotHasKey('placeholders', $array);
    }

    public function testToArrayWithMultipleAddons(): void
    {
        $addon1 = new AddonData(productId: 12345);
        $addon2 = new AddonData(productId: 67890, amount: 19.99);

        $request = new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [$addon1, $addon2],
        );

        $array = $request->toArray();

        $this->assertCount(2, $array['addons']);
        $this->assertSame(12345, $array['addons'][0]['product_id']);
        $this->assertSame(67890, $array['addons'][1]['product_id']);
    }

    public function testToArrayWithTracking(): void
    {
        $addon = new AddonData(productId: 12345);
        $tracking = new TrackingData();
        $tracking->custom = 'ref-123';
        $tracking->affiliate = 'AFF123';

        $request = new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [$addon],
            tracking: $tracking,
        );

        $array = $request->toArray();

        $this->assertArrayHasKey('tracking', $array);
        $this->assertSame('ref-123', $array['tracking']['custom']);
        $this->assertSame('AFF123', $array['tracking']['affiliate']);
    }

    public function testToArrayWithPlaceholders(): void
    {
        $addon = new AddonData(productId: 12345);
        $placeholders = new PlaceholderData();
        $placeholders->set('name', 'John Doe');
        $placeholders->set('company', 'ACME Corp');

        $request = new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [$addon],
            placeholders: $placeholders,
        );

        $array = $request->toArray();

        $this->assertArrayHasKey('placeholders', $array);
        $this->assertSame('John Doe', $array['placeholders']['name']);
        $this->assertSame('ACME Corp', $array['placeholders']['company']);
    }

    public function testValidationPassesForValidData(): void
    {
        $addon = new AddonData(productId: 12345);
        $request = new CreateAddonChangePurchaseRequest(
            purchaseId: 'P12345',
            addons: [$addon],
        );

        $this->assertTrue($request->isValid());
        $this->assertEmpty($request->validate());
    }
}
