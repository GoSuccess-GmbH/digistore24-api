<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Ipn;

use GoSuccess\Digistore24\Api\Request\Ipn\IpnSetupRequest;
use PHPUnit\Framework\TestCase;

final class IpnSetupRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new IpnSetupRequest(url: 'https://example.com/ipn');

        $this->assertInstanceOf(IpnSetupRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new IpnSetupRequest(url: 'https://example.com/ipn');

        $this->assertSame('/ipnSetup', $request->getEndpoint());
    }

    public function test_to_array_includes_url_only(): void
    {
        $request = new IpnSetupRequest(url: 'https://example.com/ipn');

        $array = $request->toArray();        $this->assertSame('https://example.com/ipn', $array['url']);
        $this->assertCount(1, $array);
    }

    public function test_to_array_includes_ipn_password_when_set(): void
    {
        $request = new IpnSetupRequest(
            url: 'https://example.com/ipn',
            ipnPassword: 'secret123',
        );

        $array = $request->toArray();        $this->assertSame('https://example.com/ipn', $array['url']);
        $this->assertSame('secret123', $array['ipn_password']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new IpnSetupRequest(url: 'https://example.com/ipn');

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
