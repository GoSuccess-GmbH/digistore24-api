<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Marketplace;

use GoSuccess\Digistore24\Api\Request\Marketplace\ListMarketplaceEntriesRequest;
use PHPUnit\Framework\TestCase;

final class ListMarketplaceEntriesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListMarketplaceEntriesRequest();
        $this->assertInstanceOf(ListMarketplaceEntriesRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ListMarketplaceEntriesRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListMarketplaceEntriesRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListMarketplaceEntriesRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

