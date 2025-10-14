<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Marketplace;

use GoSuccess\Digistore24\Api\Request\Marketplace\GetMarketplaceEntryRequest;
use PHPUnit\Framework\TestCase;

final class GetMarketplaceEntryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetMarketplaceEntryRequest(entryId: 'E12345');
        
        $this->assertInstanceOf(GetMarketplaceEntryRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetMarketplaceEntryRequest(entryId: 'E12345');
        
        $this->assertSame('getMarketplaceEntry', $request->getEndpoint());
    }

    public function test_to_array_includes_entry_id(): void
    {
        $request = new GetMarketplaceEntryRequest(entryId: 'E12345');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('E12345', $array['entry_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetMarketplaceEntryRequest(entryId: 'E12345');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

