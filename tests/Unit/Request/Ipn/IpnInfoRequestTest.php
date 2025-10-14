<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Ipn;

use GoSuccess\Digistore24\Api\Request\Ipn\IpnInfoRequest;
use PHPUnit\Framework\TestCase;

final class IpnInfoRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new IpnInfoRequest();
        $this->assertInstanceOf(IpnInfoRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new IpnInfoRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new IpnInfoRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new IpnInfoRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

