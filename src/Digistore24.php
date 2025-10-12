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
    /**
     * HTTP Client (lazy-loaded)
     * 
     * For advanced use cases where you need direct access to the HTTP client.
     */
    public ApiClient $client {
        get {
            if (!isset($this->client)) {
                $config = new Configuration(
                    apiKey: $this->apiKey,
                    baseUrl: $this->baseUrl,
                    timeout: $this->timeout,
                    language: $this->language,
                    maxRetries: $this->maxRetries,
                    operatorName: $this->operatorName,
                    debug: $this->debug,
                );
                $this->client = new ApiClient($config);
            }
            return $this->client;
        }
    }

    /**
     * Affiliate management
     */
    public AffiliateResource $affiliates {
        get => $this->affiliates ??= new AffiliateResource($this->client);
    }

    /**
     * Billing operations
     */
    public BillingResource $billing {
        get => $this->billing ??= new BillingResource($this->client);
    }

    /**
     * Buyer information
     */
    public BuyerResource $buyers {
        get => $this->buyers ??= new BuyerResource($this->client);
    }

    /**
     * Buy URL management
     */
    public BuyUrlResource $buyUrls {
        get => $this->buyUrls ??= new BuyUrlResource($this->client);
    }

    /**
     * Country information
     */
    public CountryResource $countries {
        get => $this->countries ??= new CountryResource($this->client);
    }

    /**
     * IPN/Webhook management
     */
    public IpnResource $ipn {
        get => $this->ipn ??= new IpnResource($this->client);
    }

    /**
     * API monitoring
     */
    public MonitoringResource $monitoring {
        get => $this->monitoring ??= new MonitoringResource($this->client);
    }

    /**
     * Product management
     */
    public ProductResource $products {
        get => $this->products ??= new ProductResource($this->client);
    }

    /**
     * Purchase management
     */
    public PurchaseResource $purchases {
        get => $this->purchases ??= new PurchaseResource($this->client);
    }

    /**
     * Rebilling/Subscription management
     */
    public RebillingResource $rebilling {
        get => $this->rebilling ??= new RebillingResource($this->client);
    }

    /**
     * User/Authentication management
     */
    public UserResource $users {
        get => $this->users ??= new UserResource($this->client);
    }

    /**
     * Voucher management
     */
    public VoucherResource $vouchers {
        get => $this->vouchers ??= new VoucherResource($this->client);
    }

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
        private readonly string $apiKey,
        private readonly string $baseUrl = 'https://www.digistore24.com',
        private readonly int $timeout = 30,
        private readonly string $language = 'en',
        private readonly int $maxRetries = 3,
        private readonly ?string $operatorName = null,
        private readonly bool $debug = false,
    ) {
    }
}
