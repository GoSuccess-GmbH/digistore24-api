<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Upgrade;

use GoSuccess\Digistore24\Api\DTO\UpgradeData;
use GoSuccess\Digistore24\Api\Request\Upgrade\CreateUpgradeRequest;
use PHPUnit\Framework\TestCase;

final class CreateUpgradeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $upgrade = new UpgradeData();
        $upgrade->name = 'Premium Upgrade';

        $request = new CreateUpgradeRequest(upgrade: $upgrade);

        $this->assertInstanceOf(CreateUpgradeRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $upgrade = new UpgradeData();
        $upgrade->name = 'Premium Upgrade';

        $request = new CreateUpgradeRequest(upgrade: $upgrade);

        $this->assertSame('/createUpgrade', $request->getEndpoint());
    }

    public function test_to_array_includes_data(): void
    {
        $upgrade = new UpgradeData();
        $upgrade->name = 'Premium Upgrade';
        $upgrade->toProductId = 12345;
        $upgrade->upgradeFrom = '100,200';

        $request = new CreateUpgradeRequest(upgrade: $upgrade);

        $array = $request->toArray();        $this->assertSame('Premium Upgrade', $array['name']);
        $this->assertSame(12345, $array['to_product_id']);
        $this->assertSame('100,200', $array['upgrade_from']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $upgrade = new UpgradeData();
        $upgrade->name = 'Premium Upgrade';

        $request = new CreateUpgradeRequest(upgrade: $upgrade);

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
