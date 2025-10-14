<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Ipn;

use GoSuccess\Digistore24\Api\Request\Ipn\IpnSetupRequest;
use PHPUnit\Framework\TestCase;

final class IpnSetupRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new IpnSetupRequest();
        $this->assertInstanceOf(IpnSetupRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new IpnSetupRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new IpnSetupRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new IpnSetupRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

