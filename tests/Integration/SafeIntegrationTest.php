<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use PHPUnit\Framework\Attributes\Group;

/**
 * Safe integration tests that don't cost money
 * 
 * These tests use read-only endpoints that are safe to run
 * against the real API without causing charges.
 */
#[Group('integration')]
#[Group('safe')]
class SafeIntegrationTest extends IntegrationTestCase
{
    private Digistore24 $client;

    protected function setUp(): void
    {
        parent::setUp();
        
        $apiKey = $this->getApiKey();
        $config = new Configuration(apiKey: $apiKey);
        $this->client = new Digistore24($config);
    }

    /**
     * Test that we can instantiate all resources
     * This doesn't make any API calls
     */
    public function testCanAccessAllResources(): void
    {
        $this->assertInstanceOf(\GoSuccess\Digistore24\Api\Resource\ProductResource::class, $this->client->products);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Api\Resource\PurchaseResource::class, $this->client->purchases);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Api\Resource\BuyerResource::class, $this->client->buyers);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Api\Resource\CountryResource::class, $this->client->countries);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Api\Resource\UserResource::class, $this->client->users);
    }
}

