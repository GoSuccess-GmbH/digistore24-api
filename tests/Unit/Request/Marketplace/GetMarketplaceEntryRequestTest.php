<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Marketplace;

use GoSuccess\Digistore24\Api\Request\Marketplace\GetMarketplaceEntryRequest;
use PHPUnit\Framework\TestCase;

final class GetMarketplaceEntryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetMarketplaceEntryRequest();
        $this->assertInstanceOf(GetMarketplaceEntryRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetMarketplaceEntryRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetMarketplaceEntryRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetMarketplaceEntryRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

