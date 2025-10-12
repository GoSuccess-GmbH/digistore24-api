<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Tests\Integration;

use GoSuccess\Digistore24\Digistore24;
use GoSuccess\Digistore24\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\DataTransferObject\BuyerData;
use PHPUnit\Framework\TestCase;

/**
 * Integration Test for Digistore24 Main Facade
 * 
 * @covers \GoSuccess\Digistore24\Digistore24
 */
final class Digistore24Test extends TestCase
{
    private Digistore24 $client;

    protected function setUp(): void
    {
        // Use test API key for integration tests
        $this->client = new Digistore24(
            apiKey: 'TEST-API-KEY-123456789',
            timeout: 5,
            maxRetries: 0 // Disable retries for faster tests
        );
    }

    public function testClientHasAllResources(): void
    {
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\AffiliateResource::class, $this->client->affiliates);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\BillingResource::class, $this->client->billing);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\BuyerResource::class, $this->client->buyers);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\BuyUrlResource::class, $this->client->buyUrls);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\CountryResource::class, $this->client->countries);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\IpnResource::class, $this->client->ipn);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\MonitoringResource::class, $this->client->monitoring);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\ProductResource::class, $this->client->products);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\PurchaseResource::class, $this->client->purchases);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\RebillingResource::class, $this->client->rebilling);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\UserResource::class, $this->client->users);
        $this->assertInstanceOf(\GoSuccess\Digistore24\Resource\VoucherResource::class, $this->client->vouchers);
    }

    public function testCanCreateRequestWithPropertyHooks(): void
    {
        $request = new CreateBuyUrlRequest();
        $request->productId = 12345;
        $request->validUntil = '48h';

        $this->assertSame(12345, $request->productId);
        $this->assertSame('48h', $request->validUntil);
    }

    public function testCanCreateBuyerDataWithValidation(): void
    {
        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';
        $buyer->firstName = 'John';
        $buyer->lastName = 'Doe';
        $buyer->country = 'de'; // Should be auto-uppercased

        $this->assertSame('test@example.com', $buyer->email);
        $this->assertSame('John', $buyer->firstName);
        $this->assertSame('Doe', $buyer->lastName);
        $this->assertSame('DE', $buyer->country);
    }

    public function testPropertyHookValidationThrowsExceptionForInvalidEmail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid email');

        $buyer = new BuyerData();
        $buyer->email = 'invalid-email';
    }

    public function testPropertyHookValidationThrowsExceptionForEmptyProductId(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Product ID is required');

        $request = new CreateBuyUrlRequest();
        $request->productId = '';
    }

    public function testGetClientReturnsApiClient(): void
    {
        $client = $this->client->getClient();
        $this->assertInstanceOf(\GoSuccess\Digistore24\Client\ApiClient::class, $client);
    }
}
