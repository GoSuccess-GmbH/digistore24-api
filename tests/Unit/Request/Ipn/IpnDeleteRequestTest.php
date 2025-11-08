<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Ipn;

use GoSuccess\Digistore24\Api\Request\Ipn\IpnDeleteRequest;
use PHPUnit\Framework\TestCase;

final class IpnDeleteRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new IpnDeleteRequest();

        $this->assertInstanceOf(IpnDeleteRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new IpnDeleteRequest();

        $this->assertSame('/ipnDelete', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new IpnDeleteRequest();

        $array = $request->toArray();
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new IpnDeleteRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
