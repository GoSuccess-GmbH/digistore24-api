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

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListMarketplaceEntriesRequest();
        
        $this->assertSame('listMarketplaceEntries', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListMarketplaceEntriesRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListMarketplaceEntriesRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

