<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Rebilling;

use GoSuccess\Digistore24\Api\Request\Rebilling\StartRebillingRequest;
use PHPUnit\Framework\TestCase;

final class StartRebillingRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new StartRebillingRequest();
        $this->assertInstanceOf(StartRebillingRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new StartRebillingRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new StartRebillingRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new StartRebillingRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

