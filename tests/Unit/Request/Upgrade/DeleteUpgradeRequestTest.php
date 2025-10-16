<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Upgrade;

use GoSuccess\Digistore24\Api\Request\Upgrade\DeleteUpgradeRequest;
use PHPUnit\Framework\TestCase;

final class DeleteUpgradeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeleteUpgradeRequest(upgradeId: 'UPG123');

        $this->assertInstanceOf(DeleteUpgradeRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new DeleteUpgradeRequest(upgradeId: 'UPG123');

        $this->assertSame('/deleteUpgrade', $request->getEndpoint());
    }

    public function test_to_array_includes_upgrade_id(): void
    {
        $request = new DeleteUpgradeRequest(upgradeId: 'UPG123');

        $array = $request->toArray();        $this->assertSame('UPG123', $array['upgrade_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new DeleteUpgradeRequest(upgradeId: 'UPG123');

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
