<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Rebilling;

use GoSuccess\Digistore24\Api\Request\Rebilling\ListRebillingStatusChangesRequest;
use PHPUnit\Framework\TestCase;

final class ListRebillingStatusChangesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListRebillingStatusChangesRequest();
        $this->assertInstanceOf(ListRebillingStatusChangesRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ListRebillingStatusChangesRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListRebillingStatusChangesRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListRebillingStatusChangesRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

