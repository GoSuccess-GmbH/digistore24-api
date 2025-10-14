<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Upgrade;

use GoSuccess\Digistore24\Api\Request\Upgrade\GetUpgradeRequest;
use PHPUnit\Framework\TestCase;

final class GetUpgradeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetUpgradeRequest(upgradeId: 'UPG123');
        
        $this->assertInstanceOf(GetUpgradeRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetUpgradeRequest(upgradeId: 'UPG123');
        
        $this->assertSame('getUpgrade', $request->getEndpoint());
    }

    public function test_to_array_includes_upgrade_id(): void
    {
        $request = new GetUpgradeRequest(upgradeId: 'UPG123');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('UPG123', $array['upgrade_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetUpgradeRequest(upgradeId: 'UPG123');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

