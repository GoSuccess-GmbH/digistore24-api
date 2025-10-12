<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24;

use GoSuccess\Digistore24\Client\ApiClient;
use GoSuccess\Digistore24\Client\Configuration;
use GoSuccess\Digistore24\Resource\AffiliateResource;
use GoSuccess\Digistore24\Resource\BillingResource;
use GoSuccess\Digistore24\Resource\BuyerResource;
use GoSuccess\Digistore24\Resource\BuyUrlResource;
use GoSuccess\Digistore24\Resource\CountryResource;
use GoSuccess\Digistore24\Resource\IpnResource;
use GoSuccess\Digistore24\Resource\MonitoringResource;
use GoSuccess\Digistore24\Resource\ProductResource;
use GoSuccess\Digistore24\Resource\PurchaseResource;
use GoSuccess\Digistore24\Resource\RebillingResource;
use GoSuccess\Digistore24\Resource\UserResource;
use GoSuccess\Digistore24\Resource\VoucherResource;

/**
 * Digistore24 API Client
 * 
 * Main entry point for the Digistore24 API wrapper.
 * Provides access to all API resources with a clean, fluent interface.
 * 
 * @example
 * ```php
 * // Initialize client
 * $ds24 = new Digistore24('YOUR-API-KEY');
 * 
 * // Create a buy URL
 * $request = new CreateBuyUrlRequest(productId: 12345);
 * $request->buyer = new BuyerData();
 * $request->buyer->email = 'customer@example.com';
 * 
 * $response = $ds24->buyUrls->create($request);
 * echo "Buy URL: {$response->url}\n";
 * 
 * // Get product information
 * $product = $ds24->products->get(new GetProductRequest(12345));
 * echo "Product: {$product->name}\n";
 * 
 * // List purchases
 * $purchases = $ds24->purchases->list(new ListPurchasesRequest());
 * foreach ($purchases->items as $purchase) {
 *     echo "Order: {$purchase->orderId}\n";
 * }
 * ```
 */
final class Digistore24
{
    private readonly ApiClient $client;

    /**
     * Affiliate management
     */
    public readonly AffiliateResource $affiliates;

    /**
     * Billing operations
     */
    public readonly BillingResource $billing;

    /**
     * Buyer information
     */
    public readonly BuyerResource $buyers;

    /**
     * Buy URL management
     */
    public readonly BuyUrlResource $buyUrls;

    /**
     * Country information
     */
    public readonly CountryResource $countries;

    /**
     * IPN/Webhook management
     */
    public readonly IpnResource $ipn;

    /**
     * API monitoring
     */
    public readonly MonitoringResource $monitoring;

    /**
     * Product management
     */
    public readonly ProductResource $products;

    /**
     * Purchase management
     */
    public readonly PurchaseResource $purchases;

    /**
     * Rebilling/Subscription management
     */
    public readonly RebillingResource $rebilling;

    /**
     * User/Authentication management
     */
    public readonly UserResource $users;

    /**
     * Voucher management
     */
    public readonly VoucherResource $vouchers;

    /**
     * Create a new Digistore24 API client
     * 
     * @param string $apiKey Digistore24 API key (format: XXX-XXXXXXXXXXXXXXXXX)
     * @param string $baseUrl Base URL for API (default: https://www.digistore24.com)
     * @param int $timeout Request timeout in seconds (default: 30)
     * @param string $language API response language (default: 'en')
     * @param int $maxRetries Maximum number of retry attempts for failed requests (default: 3)
     * @param string|null $operatorName Optional operator name for audit logging
     * @param bool $debug Enable debug mode with detailed logging (default: false)
     */
    public function __construct(
        string $apiKey,
        string $baseUrl = 'https://www.digistore24.com',
        int $timeout = 30,
        string $language = 'en',
        int $maxRetries = 3,
        ?string $operatorName = null,
        bool $debug = false,
    ) {
        $config = new Configuration(
            apiKey: $apiKey,
            baseUrl: $baseUrl,
            timeout: $timeout,
            language: $language,
            maxRetries: $maxRetries,
            operatorName: $operatorName,
            debug: $debug,
        );

        $this->client = new ApiClient($config);

        // Initialize all resources
        $this->affiliates = new AffiliateResource($this->client);
        $this->billing = new BillingResource($this->client);
        $this->buyers = new BuyerResource($this->client);
        $this->buyUrls = new BuyUrlResource($this->client);
        $this->countries = new CountryResource($this->client);
        $this->ipn = new IpnResource($this->client);
        $this->monitoring = new MonitoringResource($this->client);
        $this->products = new ProductResource($this->client);
        $this->purchases = new PurchaseResource($this->client);
        $this->rebilling = new RebillingResource($this->client);
        $this->users = new UserResource($this->client);
        $this->vouchers = new VoucherResource($this->client);
    }

    /**
     * Get the underlying HTTP client
     * 
     * For advanced use cases where you need direct access to the HTTP client.
     */
    public function getClient(): ApiClient
    {
        return $this->client;
    }
}
