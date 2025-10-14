<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\SmartUpgrade;

use GoSuccess\Digistore24\Api\Request\SmartUpgrade\ListSmartUpgradesRequest;
use PHPUnit\Framework\TestCase;

final class ListSmartUpgradesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListSmartUpgradesRequest();
        
        $this->assertInstanceOf(ListSmartUpgradesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListSmartUpgradesRequest();
        
        $this->assertSame('listSmartUpgrades', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListSmartUpgradesRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListSmartUpgradesRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

