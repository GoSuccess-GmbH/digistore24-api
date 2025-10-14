<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Upgrade;

use GoSuccess\Digistore24\Api\Request\Upgrade\GetUpgradeRequest;
use PHPUnit\Framework\TestCase;

final class GetUpgradeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetUpgradeRequest();
        $this->assertInstanceOf(GetUpgradeRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetUpgradeRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetUpgradeRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetUpgradeRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

