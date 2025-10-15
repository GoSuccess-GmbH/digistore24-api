# Digistore24 API Client for PHP

Modern, type-safe PHP API client for Digistore24 with **PHP 8.4 property hooks** and clean architecture.

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
- ✅ **122 Endpoints** - Complete coverage of Digistore24 API

## Requirements

- **PHP 8.4.0 or higher** (for property hooks support)
- cURL extension
- mbstring extension

## Installation

```bash
composer require gosuccess/digistore24-api
```

## Quick Start

```php
<?php

use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\BuyerData;

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
$ds24->buyUrls->create()           // Buy URL management
$ds24->products->get()              // Product information
$ds24->purchases->list()            // Order management
$ds24->rebilling->start()           // Subscription management
$ds24->affiliates->getCommission()  // Affiliate management
$ds24->ipns->setup()                // Webhook management
$ds24->monitoring->ping()           // Health checks
```

### Directory Structure

```
src/
├── Base/                       # Abstract base classes
│   ├── AbstractRequest.php     # Base for all API requests
│   ├── AbstractResource.php    # Base for all resources
│   └── AbstractResponse.php    # Base for all API responses
│
├── Client/                     # HTTP client implementation
│   ├── ApiClient.php           # Main HTTP client with retry logic
│   └── Configuration.php       # API configuration with property hooks
│
├── Contract/                   # Interfaces (reserved for future use)
│
├── DataTransferObject/         # DTOs with property hooks
│   ├── BuyerData.php           # Buyer information (email validation)
│   ├── PaymentPlanData.php     # Payment plan (currency validation)
│   └── TrackingData.php        # Tracking parameters
│
├── Exception/                  # Exception hierarchy
│   ├── ApiException.php        # Base exception
│   ├── AuthenticationException.php
│   ├── ForbiddenException.php
│   ├── NotFoundException.php
│   ├── RateLimitException.php
│   ├── RequestException.php
│   └── ValidationException.php
│
├── Http/                       # HTTP-related classes
│   ├── Method.php              # HTTP methods enum
│   ├── Response.php            # HTTP response wrapper
│   └── StatusCode.php          # HTTP status codes enum
│
├── Request/                    # Typed API requests (122 endpoints)
│   ├── Affiliate/
│   ├── Billing/
│   ├── Buyer/
│   ├── BuyUrl/
│   ├── Country/
│   ├── Ipn/
│   ├── Monitoring/
│   ├── Product/
│   ├── Purchase/
│   ├── Rebilling/
│   ├── User/
│   └── Voucher/
│
├── Resource/                   # Resource classes (12 resources)
│   ├── AffiliateResource.php
│   ├── BillingResource.php
│   ├── BuyerResource.php
│   ├── BuyUrlResource.php
│   ├── CountryResource.php
│   ├── IpnResource.php
│   ├── MonitoringResource.php
│   ├── ProductResource.php
│   ├── PurchaseResource.php
│   ├── RebillingResource.php
│   ├── UserResource.php
│   └── VoucherResource.php
│
├── Response/                   # Typed API responses
│   ├── AccountAccess/
│   │   └── AccountAccessEntry.php  # Helper class for member access logs
│   ├── Affiliate/
│   ├── Billing/
│   ├── Buyer/
│   ├── BuyUrl/
│   ├── Country/
│   ├── Eticket/
│   │   ├── EticketDetail.php       # Helper class for e-ticket details
│   │   └── EticketListItem.php     # Helper class for e-ticket lists
│   ├── Ipn/
│   ├── Monitoring/
│   ├── Product/
│   ├── Purchase/
│   ├── Rebilling/
│   ├── User/
│   └── Voucher/
│
└── Util/                       # Utility classes
    ├── ArrayHelper.php         # Array operations
    ├── TypeConverter.php       # Type conversions
    └── Validator.php           # Validation utilities
```

### Naming Conventions

**Directories:**
- ✅ **Singular form**: `Exception/`, `Request/`, `Response/`
- ❌ NOT plural: ~~`Exceptions/`~~, ~~`Requests/`~~, ~~`Responses/`~~

**Classes:**
- **Abstract classes**: `AbstractRequest`, `AbstractResponse` → in `Base/`
- **Interfaces**: `RequestInterface`, `ResponseInterface` → in `Contract/`
- **DTOs**: `BuyerData`, `PaymentPlanData` → in `DataTransferObject/`
- **Exceptions**: `ApiException`, `NotFoundException` → in `Exception/`
- **Enums**: `Method`, `StatusCode` → in `Http/`
- **Helper classes**: `AccountAccessEntry`, `EticketDetail` → in `Response/*/`

**Namespaces:**
```php
GoSuccess\Digistore24\Api\Base\AbstractRequest
GoSuccess\Digistore24\Api\Contract\RequestInterface
GoSuccess\Digistore24\Api\DataTransferObject\BuyerData
GoSuccess\Digistore24\Api\Exception\ApiException
GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest
GoSuccess\Digistore24\Api\Response\Eticket\EticketDetail
```

### Architecture Decisions

1. **Singular directories** - More consistent with PSR standards
2. **Property hooks** - Eliminate constructors where possible
3. **final classes** - Not readonly (allow mutation)
4. **Typed constants** - Enums instead of magic values
5. **String interpolation** - `"{$var}"` instead of concatenation
6. **Single class per file** - Helper classes in separate files
7. **Use imports** - Never use fully-qualified class names (FQCN)

## PHP 8.4 Property Hooks

Property hooks provide automatic validation without constructors:

```php
final class BuyerData
{
    public string $email {
        set {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                throw new \InvalidArgumentException("Invalid email");
            }
            $this->email = $value;
        }
    }
    
    public string $country {
        set {
            $upper = strtoupper($value);
            if (!in_array($upper, ['DE', 'AT', 'CH', 'US', ...])) {
                throw new \InvalidArgumentException("Invalid country code");
            }
            $this->country = $upper;
        }
    }
}
```

**Benefits:**
- ✅ No boilerplate constructors
- ✅ Automatic validation on assignment
- ✅ Mutable properties (read AND write)
- ✅ Clean, maintainable code

**Usage:**
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
use GoSuccess\Digistore24\Api\DataTransferObject\PaymentPlanData;

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
use GoSuccess\Digistore24\Api\DataTransferObject\TrackingData;

$tracking = new TrackingData();
$tracking->affiliate = 'partner123';
$tracking->utmSource = 'newsletter';
$tracking->utmMedium = 'email';
$tracking->utmCampaign = 'summer2024';
$request->tracking = $tracking;
```

### Error Handling

```php
use GoSuccess\Digistore24\Api\Exception\{
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

| Resource | Description | Endpoints | Status |
|----------|-------------|-----------|--------|
| `affiliates` | Commission management | 8 | ✅ Complete |
| `billing` | On-demand invoicing | 1 | ✅ Complete |
| `buyers` | Customer information | 8 | ✅ Complete |
| `buyUrls` | Order form URL management | 3 | ✅ Complete |
| `countries` | Country/region data | 2 | ✅ Complete |
| `ipns` | Webhook management | 3 | ✅ Complete |
| `monitoring` | Health checks | 1 | ✅ Complete |
| `products` | Product management | 59 | ✅ Complete |
| `purchases` | Order information | 24 | ✅ Complete |
| `rebilling` | Subscription management | 4 | ✅ Complete |
| `users` | Authentication | 3 | ✅ Complete |
| `vouchers` | Discount codes | 6 | ✅ Complete |
| **Total** | | **122** | **✅ 100%** |

## API Endpoints Documentation

### Affiliate Management
| Endpoint | Documentation |
|----------|---------------|
| `getAffiliateCommission` | [View](./docs/getAffiliateCommission.md) |
| `updateAffiliateCommission` | [View](./docs/updateAffiliateCommission.md) |
| `getAffiliateForEmail` | - |
| `setAffiliateForEmail` | - |
| `getReferringAffiliate` | - |
| `setReferringAffiliate` | - |
| `validateAffiliate` | - |
| `statsAffiliateToplist` | - |

### Billing & Invoicing
| Endpoint | Documentation |
|----------|---------------|
| `createBillingOnDemand` | [View](./docs/createBillingOnDemand.md) |
| `listInvoices` | - |
| `resendInvoiceMail` | - |

### Buyer Management
| Endpoint | Documentation |
|----------|---------------|
| `getBuyer` | [View](./docs/getBuyer.md) |
| `updateBuyer` | - |
| `listBuyers` | - |
| `getCustomerToAffiliateBuyerDetails` | - |

### Buy URL Management
| Endpoint | Documentation |
|----------|---------------|
| `createBuyUrl` | [View](./docs/createBuyUrl.md) |
| `listBuyUrls` | [View](./docs/listBuyUrl.md) |
| `deleteBuyUrl` | [View](./docs/deleteBuyUrl.md) |

### Country & Currency
| Endpoint | Documentation |
|----------|---------------|
| `listCountries` | [View](./docs/listCountries.md) |
| `listCurrencies` | - |

### Delivery Management
| Endpoint | Documentation |
|----------|---------------|
| `getDelivery` | - |
| `updateDelivery` | - |
| `listDeliveries` | - |

### E-Tickets
| Endpoint | Documentation |
|----------|---------------|
| `createEticket` | - |
| `getEticket` | - |
| `listEtickets` | - |
| `validateEticket` | - |
| `getEticketSettings` | - |
| `listEticketLocations` | - |
| `listEticketTemplates` | - |

### Forms & Custom Data
| Endpoint | Documentation |
|----------|---------------|
| `listCustomFormRecords` | - |

### IPN/Webhook Management
| Endpoint | Documentation |
|----------|---------------|
| `ipnSetup` | [View](./docs/ipnSetup.md) |
| `ipnInfo` | [View](./docs/ipnInfo.md) |
| `ipnDelete` | [View](./docs/ipnDelete.md) |

### Images
| Endpoint | Documentation |
|----------|---------------|
| `createImage` | - |
| `getImage` | - |
| `listImages` | - |
| `deleteImage` | - |

### Marketplace
| Endpoint | Documentation |
|----------|---------------|
| `getMarketplaceEntry` | - |
| `listMarketplaceEntries` | - |

### Member Access
| Endpoint | Documentation |
|----------|---------------|
| `listAccountAccess` | - |
| `logMemberAccess` | - |

### Monitoring
| Endpoint | Documentation |
|----------|---------------|
| `ping` | [View](./docs/ping.md) |

### Order Forms
| Endpoint | Documentation |
|----------|---------------|
| `createOrderform` | - |
| `getOrderform` | - |
| `updateOrderform` | - |
| `deleteOrderform` | - |
| `listOrderforms` | - |
| `getOrderformMetas` | - |

### Payment Plans
| Endpoint | Documentation |
|----------|---------------|
| `createPaymentplan` | - |
| `updatePaymentplan` | - |
| `deletePaymentplan` | - |
| `listPaymentPlans` | - |

### Payouts & Commissions
| Endpoint | Documentation |
|----------|---------------|
| `listPayouts` | - |
| `listCommissions` | - |

### Product Management
| Endpoint | Documentation |
|----------|---------------|
| `createProduct` | [View](./docs/createProduct.md) |
| `getProduct` | [View](./docs/getProduct.md) |
| `updateProduct` | - |
| `deleteProduct` | - |
| `copyProduct` | [View](./docs/copyProduct.md) |
| `listProducts` | [View](./docs/listProducts.md) |
| `listProductTypes` | - |

### Product Groups
| Endpoint | Documentation |
|----------|---------------|
| `createProductGroup` | - |
| `getProductGroup` | - |
| `updateProductGroup` | - |
| `deleteProductGroup` | - |
| `listProductGroups` | - |

### Purchase Management
| Endpoint | Documentation |
|----------|---------------|
| `getPurchase` | [View](./docs/getPurchase.md) |
| `updatePurchase` | - |
| `listPurchases` | [View](./docs/listPurchases.md) |
| `listPurchasesOfEmail` | - |
| `getPurchaseTracking` | [View](./docs/getPurchaseTracking.md) |
| `addBalanceToPurchase` | [View](./docs/addBalanceToPurchase.md) |
| `createUpgradePurchase` | [View](./docs/createUpgradePurchase.md) |
| `createAddonChangePurchase` | - |
| `getPurchaseDownloads` | - |
| `refundPurchase` | - |
| `refundPartially` | - |
| `resendPurchaseConfirmationMail` | - |

### Rebilling/Subscriptions
| Endpoint | Documentation |
|----------|---------------|
| `startRebilling` | [View](./docs/startRebilling.md) |
| `stopRebilling` | [View](./docs/stopRebilling.md) |
| `createRebillingPayment` | [View](./docs/createRebillingPayment.md) |
| `listRebillingStatusChanges` | [View](./docs/listRebillingStatusChanges.md) |

### Service Proof
| Endpoint | Documentation |
|----------|---------------|
| `getServiceProofRequest` | - |
| `updateServiceProofRequest` | - |
| `listServiceProofRequests` | - |

### Shipping
| Endpoint | Documentation |
|----------|---------------|
| `createShippingCostPolicy` | - |
| `getShippingCostPolicy` | - |
| `updateShippingCostPolicy` | - |
| `deleteShippingCostPolicy` | - |
| `listShippingCostPolicies` | - |

### Statistics
| Endpoint | Documentation |
|----------|---------------|
| `statsSales` | - |
| `statsSalesSummary` | - |
| `statsDailyAmounts` | - |
| `statsExpectedPayouts` | - |
| `statsMarketplace` | - |

### Tracking & Conversion
| Endpoint | Documentation |
|----------|---------------|
| `renderJsTrackingCode` | - |
| `listConversionTools` | - |

### Transactions
| Endpoint | Documentation |
|----------|---------------|
| `listTransactions` | - |
| `refundTransaction` | - |
| `reportFraud` | - |

### Upgrades
| Endpoint | Documentation |
|----------|---------------|
| `createUpgrade` | - |
| `getUpgrade` | - |
| `deleteUpgrade` | - |
| `listUpgrades` | - |
| `getSmartupgrade` | - |
| `listSmartUpgrades` | - |

### Upsells
| Endpoint | Documentation |
|----------|---------------|
| `getUpsells` | - |
| `updateUpsells` | - |
| `deleteUpsells` | - |

### User/API Key Management
| Endpoint | Documentation |
|----------|---------------|
| `requestApiKey` | [View](./docs/requestApiKey.md) |
| `retrieveApiKey` | [View](./docs/retrieveApiKey.md) |
| `unregister` | [View](./docs/unregister.md) |
| `getUserInfo` | [View](./docs/getUserInfo.md) |
| `getGlobalSettings` | - |

### Vouchers/Coupons
| Endpoint | Documentation |
|----------|---------------|
| `createVoucher` | - |
| `getVoucher` | [View](./docs/getVoucher.md) |
| `updateVoucher` | - |
| `deleteVoucher` | - |
| `listVouchers` | - |
| `validateCouponCode` | - |

### License Keys
| Endpoint | Documentation |
|----------|---------------|
| `validateLicenseKey` | - |

## Migration

Upgrading from `gosuccess/php-ds24-api-wrapper`? See [MIGRATION.md](MIGRATION.md) for detailed instructions on namespace changes, constructor updates, and breaking changes.

## Testing

```bash
# Run all tests
composer test

# Run tests with coverage
composer test:coverage
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Support

- **Documentation**: Check the `docs/` directory for endpoint-specific guides
- **Issues**: Report bugs on [GitHub Issues](https://github.com/GoSuccess-GmbH/digistore24-api/issues)
- **Migration Guide**: See [MIGRATION.md](MIGRATION.md) for upgrading from v1.x