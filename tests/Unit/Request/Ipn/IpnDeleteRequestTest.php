<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Ipn;

use GoSuccess\Digistore24\Api\Enum\HttpMethod;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnDeleteRequest;
use PHPUnit\Framework\TestCase;

final class IpnDeleteRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new IpnDeleteRequest(domainId: 'my-platform');

        $this->assertInstanceOf(IpnDeleteRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new IpnDeleteRequest(domainId: 'my-platform');

        $this->assertSame('/ipnDelete', $request->getEndpoint());
    }

    public function test_method_returns_delete(): void
    {
        $request = new IpnDeleteRequest(domainId: 'my-platform');

        $this->assertSame(HttpMethod::DELETE, $request->getMethod());
    }

    public function test_to_array_includes_domain_id(): void
    {
        $request = new IpnDeleteRequest(domainId: 'my-platform');

        $array = $request->toArray();
        $this->assertSame('my-platform', $array['domain_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new IpnDeleteRequest(domainId: 'my-platform');

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
