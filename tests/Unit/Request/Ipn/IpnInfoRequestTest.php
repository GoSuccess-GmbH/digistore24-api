<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Ipn;

use GoSuccess\Digistore24\Api\Enum\HttpMethod;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnInfoRequest;
use PHPUnit\Framework\TestCase;

final class IpnInfoRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new IpnInfoRequest();

        $this->assertInstanceOf(IpnInfoRequest::class, $request);
    }

    public function test_can_create_instance_with_domain_id(): void
    {
        $request = new IpnInfoRequest(domainId: 'my-platform');

        $this->assertInstanceOf(IpnInfoRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new IpnInfoRequest();

        $this->assertSame('/ipnInfo', $request->getEndpoint());
    }

    public function test_method_returns_get(): void
    {
        $request = new IpnInfoRequest();

        $this->assertSame(HttpMethod::GET, $request->getMethod());
    }

    public function test_to_array_returns_empty_array_without_domain_id(): void
    {
        $request = new IpnInfoRequest();

        $array = $request->toArray();
        $this->assertEmpty($array);
    }

    public function test_to_array_includes_domain_id_when_set(): void
    {
        $request = new IpnInfoRequest(domainId: 'my-platform');

        $array = $request->toArray();
        $this->assertSame('my-platform', $array['domain_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new IpnInfoRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
