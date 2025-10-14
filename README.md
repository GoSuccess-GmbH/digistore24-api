# PHP Digistore24 API Wrapper

Modern, type-safe PHP wrapper for the Digistore24 API with **PHP 8.4 property hooks** and clean architecture.

[![PHP Version](https://img.shields.io/badge/PHP-8.4%2B-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

## Features

- ✨ **PHP 8.4 Property Hooks** - Automatic validation on property assignment
- 🎯 **Type-Safe** - Full type hints, enums, and generics throughout
- 🏗️ **Clean Architecture** - Resource-based design with separation of concerns
- 🔄 **Automatic Retry** - Built-in exponential backoff for failed requests
- 🚦 **Rate Limiting** - Handles API rate limits gracefully
- 📝 **Fully Documented** - Comprehensive PHPDoc with examples
- 🧪 **Exception Handling** - Typed exceptions for different error scenarios

## Requirements

- **PHP 8.4.0 or higher** (for property hooks support)
- cURL extension
- mbstring extension

## Installation

```bash
composer require gosuccess/php-ds24-api-wrapper
```

## Quick Start

```php
<?php

use GoSuccess\Digistore24\Digistore24;
use GoSuccess\Digistore24\Client\Configuration;
use GoSuccess\Digistore24\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\DataTransferObject\BuyerData;

// Initialize configuration
$config = new Configuration('YOUR-API-KEY');

// Or with advanced options
$config = new Configuration(
    apiKey: 'YOUR-API-KEY',
    timeout: 60,
    debug: true
);

// Create client
$ds24 = new Digistore24($config);

// Create a buy URL
$request = new CreateBuyUrlRequest();
$request->productId = 12345;
$request->validUntil = '48h';

// Add buyer data (with automatic validation)
$buyer = new BuyerData();
$buyer->email = 'customer@example.com';  // Validates email format
$buyer->firstName = 'John';
$buyer->country = 'de';  // Auto-uppercased to 'DE'
$request->buyer = $buyer;

// Execute request
$response = $ds24->buyUrls->create($request);
echo "Buy URL: {$response->url}\n";
```

## Architecture

This wrapper uses a **resource-based architecture** with typed requests and responses:

```php
$ds24->buyUrls->create()      // Buy URL management
$ds24->products->get()         // Product information
$ds24->purchases->list()       // Order management
$ds24->rebilling->start()      // Subscription management
$ds24->affiliates->getCommission()  // Affiliate management
```

See [ARCHITECTURE.md](ARCHITECTURE.md) for detailed documentation.

## PHP 8.4 Property Hooks

Property hooks provide automatic validation without constructors:

```php
$buyer = new BuyerData();
$buyer->email = 'test@example.com';  // ✅ Valid
$buyer->email = 'invalid';           // ❌ Throws InvalidArgumentException

$buyer->country = 'de';              // ✅ Auto-uppercased to 'DE'
$buyer->country = 'invalid';         // ❌ Throws InvalidArgumentException
```

## Examples

### Create Buy URL with Payment Plan

```php
use GoSuccess\Digistore24\DataTransferObject\PaymentPlanData;

$request = new CreateBuyUrlRequest();
$request->productId = 12345;

$paymentPlan = new PaymentPlanData();
$paymentPlan->firstAmount = 9.99;
$paymentPlan->otherAmounts = 29.99;
$paymentPlan->currency = 'eur';  // Auto-uppercased
$paymentPlan->numberOfInstallments = 12;
$request->paymentPlan = $paymentPlan;

$response = $ds24->buyUrls->create($request);
```

### Add Tracking Parameters

```php
use GoSuccess\Digistore24\DataTransferObject\TrackingData;

$tracking = new TrackingData();
$tracking->affiliate = 'partner123';
$tracking->utmSource = 'newsletter';
$tracking->utmMedium = 'email';
$tracking->utmCampaign = 'summer2024';
$request->tracking = $tracking;
```

### Error Handling

```php
use GoSuccess\Digistore24\Exception\{
    ApiException,
    AuthenticationException,
    ValidationException,
    RateLimitException
};

try {
    $response = $ds24->buyUrls->create($request);
} catch (AuthenticationException $e) {
    echo "Invalid API key: {$e->getMessage()}\n";
} catch (ValidationException $e) {
    echo "Validation error: {$e->getMessage()}\n";
} catch (RateLimitException $e) {
    echo "Rate limit exceeded, retry after: {$e->getContextValue('retry_after')}\n";
} catch (ApiException $e) {
    echo "API error: {$e->getMessage()}\n";
}
```

## Available Resources

| Resource | Description | Status |
|----------|-------------|--------|
| `buyUrls` | Order form URL management | ✅ Implemented |
| `products` | Product management | 🚧 Coming soon |
| `purchases` | Order information | 🚧 Coming soon |
| `rebilling` | Subscription management | 🚧 Coming soon |
| `affiliates` | Commission management | 🚧 Coming soon |
| `billing` | On-demand invoicing | 🚧 Coming soon |
| `buyers` | Customer information | 🚧 Coming soon |
| `countries` | Country/region data | 🚧 Coming soon |
| `ipn` | Webhook management | 🚧 Coming soon |
| `monitoring` | Health checks | 🚧 Coming soon |
| `users` | Authentication | 🚧 Coming soon |
| `vouchers` | Discount codes | 🚧 Coming soon |

## Documentation

- [x]  [addBalanceToPurchase](./docs/addBalanceToPurchase.md)
- [x]  [copyProduct](./docs/copyProduct.md)
- [ ]  createAddonChangePurchase
- [x]  [createBillingOnDemand](./docs/createBillingOnDemand.md)
- [x]  [createBuyUrl](./docs/createBuyUrl.md)
- [ ]  createEticket
- [ ]  createImage
- [ ]  createOrderform
- [ ]  createPaymentplan
- [x]  [createProduct](./docs/createProduct.md)
- [ ]  createProductGroup
- [x]  [createRebillingPayment](./docs/createRebillingPayment.md)
- [ ]  createShippingCostPolicy
- [ ]  createUpgrade
- [x]  [createUpgradePurchase](./docs/createUpgradePurchase.md)
- [ ]  createVoucher
- [x]  [deleteBuyUrl](./docs/deleteBuyUrl.md)
- [ ]  deleteImage
- [ ]  deleteOrderform
- [ ]  deletePaymentplan
- [ ]  deleteProduct
- [ ]  deleteProductGroup
- [ ]  deleteShippingCostPolicy
- [ ]  deleteUpgrade
- [ ]  deleteUpsells
- [ ]  deleteVoucher
- [x]  [getAffiliateCommission](./docs/getAffiliateCommission.md)
- [ ]  getAffiliateForEmail
- [x]  [getBuyer](./docs/getBuyer.md)
- [ ]  getCustomerToAffiliateBuyerDetails
- [ ]  getDelivery
- [ ]  getEticket
- [ ]  getEticketSettings
- [ ]  getGlobalSettings
- [ ]  getImage
- [ ]  getMarketplaceEntry
- [ ]  getOrderform
- [ ]  getOrderformMetas
- [x]  [getProduct](./docs/getProduct.md)
- [ ]  getProductGroup
- [x]  [getPurchase](./docs/getPurchase.md)
- [ ]  getPurchaseDownloads
- [x]  [getPurchaseTracking](./docs/getPurchaseTracking.md)
- [ ]  getReferringAffiliate
- [ ]  getServiceProofRequest
- [ ]  getShippingCostPolicy
- [ ]  getSmartupgrade
- [ ]  getUpgrade
- [ ]  getUpsells
- [x]  [getUserInfo](./docs/getUserInfo.md)
- [x]  [getVoucher](./docs/getVoucher.md)
- [x]  [ipnDelete](./docs/ipnDelete.md)
- [x]  [ipnInfo](./docs/ipnInfo.md)
- [x]  [ipnSetup](./docs/ipnSetup.md)
- [ ]  listAccountAccess
- [ ]  listBuyers
- [x]  [listBuyUrls](./docs/listBuyUrl.md)
- [ ]  listCommissions
- [ ]  listConversionTools
- [x]  [listCountries](./docs/listCountries.md)
- [ ]  listCurrencies
- [ ]  listCustomFormRecords
- [ ]  listDeliveries
- [ ]  listEticketLocations
- [ ]  listEtickets
- [ ]  listEticketTemplates
- [ ]  listImages
- [ ]  listInvoices
- [ ]  listMarketplaceEntries
- [ ]  listOrderforms
- [ ]  listPaymentPlans
- [ ]  listPayouts
- [ ]  listProductGroups
- [ ]  listProducts
- [ ]  listProductTypes
- [ ]  listPurchases
- [ ]  listPurchasesOfEmail
- [x]  [listRebillingStatusChanges](./docs/listRebillingStatusChanges.md)
- [ ]  listServiceProofRequests
- [ ]  listShippingCostPolicies
- [ ]  listSmartUpgrades
- [ ]  listTransactions
- [ ]  listUpgrades
- [ ]  listVouchers
- [ ]  logMemberAccess
- [x]  [ping](./docs/ping.md)
- [ ]  refundPartially
- [ ]  refundPurchase
- [ ]  refundTransaction
- [ ]  renderJsTrackingCode
- [ ]  reportFraud
- [x]  [requestApiKey](./docs/requestApiKey.md)
- [ ]  resendInvoiceMail
- [ ]  resendPurchaseConfirmationMail
- [x]  [retrieveApiKey](./docs/retrieveApiKey.md)
- [ ]  setAffiliateForEmail
- [ ]  setReferringAffiliate
- [x]  [startRebilling](./docs/startRebilling.md)
- [ ]  statsAffiliateToplist
- [ ]  statsDailyAmounts
- [ ]  statsExpectedPayouts
- [ ]  statsMarketplace
- [ ]  statsSales
- [ ]  statsSalesSummary
- [x]  [stopRebilling](./docs/stopRebilling.md)
- [x]  [unregister](./docs/unregister.md)
- [x]  [updateAffiliateCommission](./docs/updateAffiliateCommission.md)
- [ ]  updateBuyer
- [ ]  updateDelivery
- [ ]  updateOrderform
- [ ]  updatePaymentplan
- [ ]  updateProduct
- [ ]  updateProductGroup
- [ ]  updatePurchase
- [ ]  updateServiceProofRequest
- [ ]  updateShippingCostPolicy
- [ ]  updateUpsells
- [ ]  updateVoucher
- [ ]  validateAffiliate
- [ ]  validateCouponCode
- [ ]  validateEticket
- [ ]  validateLicenseKey