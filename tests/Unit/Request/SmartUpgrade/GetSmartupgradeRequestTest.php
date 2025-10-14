<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\SmartUpgrade;

use GoSuccess\Digistore24\Api\Request\SmartUpgrade\GetSmartupgradeRequest;
use PHPUnit\Framework\TestCase;

final class GetSmartupgradeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetSmartupgradeRequest();
        $this->assertInstanceOf(GetSmartupgradeRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetSmartupgradeRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetSmartupgradeRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetSmartupgradeRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

