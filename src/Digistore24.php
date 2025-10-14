<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api;

use GoSuccess\Digistore24\Api\Client\ApiClient;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Contract\HttpClientInterface;
use GoSuccess\Digistore24\Api\Resource\AccountAccessResource;
use GoSuccess\Digistore24\Api\Resource\AffiliateResource;
use GoSuccess\Digistore24\Api\Resource\ApiKeyResource;
use GoSuccess\Digistore24\Api\Resource\BillingResource;
use GoSuccess\Digistore24\Api\Resource\BuyerResource;
use GoSuccess\Digistore24\Api\Resource\BuyUrlResource;
use GoSuccess\Digistore24\Api\Resource\CommissionResource;
use GoSuccess\Digistore24\Api\Resource\ConversionToolResource;
use GoSuccess\Digistore24\Api\Resource\CountryResource;
use GoSuccess\Digistore24\Api\Resource\CustomFormResource;
use GoSuccess\Digistore24\Api\Resource\DeliveryResource;
use GoSuccess\Digistore24\Api\Resource\EticketResource;
use GoSuccess\Digistore24\Api\Resource\FraudResource;
use GoSuccess\Digistore24\Api\Resource\ImageResource;
use GoSuccess\Digistore24\Api\Resource\InvoiceResource;
use GoSuccess\Digistore24\Api\Resource\IpnResource;
use GoSuccess\Digistore24\Api\Resource\LicenseResource;
use GoSuccess\Digistore24\Api\Resource\MarketplaceResource;
use GoSuccess\Digistore24\Api\Resource\MonitoringResource;
use GoSuccess\Digistore24\Api\Resource\OrderFormResource;
use GoSuccess\Digistore24\Api\Resource\PaymentPlanResource;
use GoSuccess\Digistore24\Api\Resource\PayoutResource;
use GoSuccess\Digistore24\Api\Resource\ProductGroupResource;
use GoSuccess\Digistore24\Api\Resource\ProductResource;
use GoSuccess\Digistore24\Api\Resource\PurchaseResource;
use GoSuccess\Digistore24\Api\Resource\RebillingResource;
use GoSuccess\Digistore24\Api\Resource\ServiceProofResource;
use GoSuccess\Digistore24\Api\Resource\ShippingResource;
use GoSuccess\Digistore24\Api\Resource\SmartUpgradeResource;
use GoSuccess\Digistore24\Api\Resource\StatisticsResource;
use GoSuccess\Digistore24\Api\Resource\SystemResource;
use GoSuccess\Digistore24\Api\Resource\TrackingResource;
use GoSuccess\Digistore24\Api\Resource\TransactionResource;
use GoSuccess\Digistore24\Api\Resource\UpgradeResource;
use GoSuccess\Digistore24\Api\Resource\UpsellResource;
use GoSuccess\Digistore24\Api\Resource\UserResource;
use GoSuccess\Digistore24\Api\Resource\VoucherResource;

/**
 * Digistore24 API Client
 * 
 * Main entry point for the Digistore24 API wrapper.
 * Provides access to all API resources with a clean, fluent interface.
 * 
 * @example
 * ```php
 * // Initialize client with simple configuration
 * $config = new Configuration('YOUR-API-KEY');
 * $ds24 = new Digistore24($config);
 * 
 * // Or with advanced options
 * $config = new Configuration(
 *     apiKey: 'YOUR-API-KEY',
 *     timeout: 60,
 *     debug: true
 * );
 * $ds24 = new Digistore24($config);
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
 * 
 * // Manage vouchers
 * $vouchers = $ds24->vouchers->list(new ListVouchersRequest());
 * 
 * // Get statistics
 * $stats = $ds24->statistics->salesSummary(new StatsSalesSummaryRequest());
 * 
 * // Manage affiliates
 * $commission = $ds24->affiliates->getCommission(
 *     new GetAffiliateCommissionRequest()
 * );
 * ```
 */
final class Digistore24
{
    /**
     * HTTP Client (lazy-loaded)
     * 
     * For advanced use cases where you need direct access to the HTTP client.
     */
    public HttpClientInterface $client {
        get {
            if (!isset($this->client)) {
                $this->client = new ApiClient($this->config);
            }
            return $this->client;
        }
    }

    /**
     * Account Access management
     */
    public AccountAccessResource $accountAccess {
        get => $this->accountAccess ??= new AccountAccessResource($this->client);
    }

    /**
     * Affiliate management
     */
    public AffiliateResource $affiliates {
        get => $this->affiliates ??= new AffiliateResource($this->client);
    }

    /**
     * API Key management
     */
    public ApiKeyResource $apiKeys {
        get => $this->apiKeys ??= new ApiKeyResource($this->client);
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
     * Commission management
     */
    public CommissionResource $commissions {
        get => $this->commissions ??= new CommissionResource($this->client);
    }

    /**
     * Conversion Tool management
     */
    public ConversionToolResource $conversionTools {
        get => $this->conversionTools ??= new ConversionToolResource($this->client);
    }

    /**
     * Country information
     */
    public CountryResource $countries {
        get => $this->countries ??= new CountryResource($this->client);
    }

    /**
     * Custom Form management
     */
    public CustomFormResource $customForms {
        get => $this->customForms ??= new CustomFormResource($this->client);
    }

    /**
     * Delivery management
     */
    public DeliveryResource $deliveries {
        get => $this->deliveries ??= new DeliveryResource($this->client);
    }

    /**
     * E-Ticket management
     */
    public EticketResource $etickets {
        get => $this->etickets ??= new EticketResource($this->client);
    }

    /**
     * Fraud reporting
     */
    public FraudResource $fraud {
        get => $this->fraud ??= new FraudResource($this->client);
    }

    /**
     * Image management
     */
    public ImageResource $images {
        get => $this->images ??= new ImageResource($this->client);
    }

    /**
     * Invoice management
     */
    public InvoiceResource $invoices {
        get => $this->invoices ??= new InvoiceResource($this->client);
    }

    /**
     * IPN/Webhook management
     */
    public IpnResource $ipn {
        get => $this->ipn ??= new IpnResource($this->client);
    }

    /**
     * License management
     */
    public LicenseResource $licenses {
        get => $this->licenses ??= new LicenseResource($this->client);
    }

    /**
     * Marketplace management
     */
    public MarketplaceResource $marketplace {
        get => $this->marketplace ??= new MarketplaceResource($this->client);
    }

    /**
     * API monitoring
     */
    public MonitoringResource $monitoring {
        get => $this->monitoring ??= new MonitoringResource($this->client);
    }

    /**
     * Order Form management
     */
    public OrderFormResource $orderForms {
        get => $this->orderForms ??= new OrderFormResource($this->client);
    }

    /**
     * Payment Plan management
     */
    public PaymentPlanResource $paymentPlans {
        get => $this->paymentPlans ??= new PaymentPlanResource($this->client);
    }

    /**
     * Payout management
     */
    public PayoutResource $payouts {
        get => $this->payouts ??= new PayoutResource($this->client);
    }

    /**
     * Product Group management
     */
    public ProductGroupResource $productGroups {
        get => $this->productGroups ??= new ProductGroupResource($this->client);
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
     * Service Proof management
     */
    public ServiceProofResource $serviceProofs {
        get => $this->serviceProofs ??= new ServiceProofResource($this->client);
    }

    /**
     * Shipping management
     */
    public ShippingResource $shipping {
        get => $this->shipping ??= new ShippingResource($this->client);
    }

    /**
     * Smart Upgrade management
     */
    public SmartUpgradeResource $smartUpgrades {
        get => $this->smartUpgrades ??= new SmartUpgradeResource($this->client);
    }

    /**
     * Statistics and Reports
     */
    public StatisticsResource $statistics {
        get => $this->statistics ??= new StatisticsResource($this->client);
    }

    /**
     * System information
     */
    public SystemResource $system {
        get => $this->system ??= new SystemResource($this->client);
    }

    /**
     * Tracking management
     */
    public TrackingResource $tracking {
        get => $this->tracking ??= new TrackingResource($this->client);
    }

    /**
     * Transaction management
     */
    public TransactionResource $transactions {
        get => $this->transactions ??= new TransactionResource($this->client);
    }

    /**
     * Upgrade management
     */
    public UpgradeResource $upgrades {
        get => $this->upgrades ??= new UpgradeResource($this->client);
    }

    /**
     * Upsell management
     */
    public UpsellResource $upsells {
        get => $this->upsells ??= new UpsellResource($this->client);
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
     * @param Configuration $config API configuration object
     */
    public function __construct(
        private readonly Configuration $config,
    ) {
    }
}
