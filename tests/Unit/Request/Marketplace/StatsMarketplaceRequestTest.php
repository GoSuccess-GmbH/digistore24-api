<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Marketplace;

use GoSuccess\Digistore24\Api\Request\Marketplace\StatsMarketplaceRequest;
use PHPUnit\Framework\TestCase;

final class StatsMarketplaceRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new StatsMarketplaceRequest();
        
        $this->assertInstanceOf(StatsMarketplaceRequest::class, $request);
    }

    public function test_can_create_instance_with_dates(): void
    {
        $request = new StatsMarketplaceRequest(from: '2024-01-01', to: '2024-12-31');
        
        $this->assertInstanceOf(StatsMarketplaceRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new StatsMarketplaceRequest();
        
        $this->assertSame('statsMarketplace', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array_without_dates(): void
    {
        $request = new StatsMarketplaceRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_to_array_includes_dates_when_set(): void
    {
        $request = new StatsMarketplaceRequest(from: '2024-01-01', to: '2024-12-31');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('2024-01-01', $array['from']);
        $this->assertSame('2024-12-31', $array['to']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new StatsMarketplaceRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

