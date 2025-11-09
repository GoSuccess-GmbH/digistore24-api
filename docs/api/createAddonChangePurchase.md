# Create Addon Change Purchase

Creates a package change order to add or remove products from an existing order.

## Endpoint

`POST /createAddonChangePurchase`

## Description

This endpoint allows you to modify an existing purchase by adding or removing add-on products. The main product's quantity cannot be changed through this endpoint. All added products must be subscriptions. This functionality requires the "Billing on demand" right to be enabled for your vendor account.

## Requirements

- "Billing on demand" must be enabled for your vendor account
- Reference purchase must have been made with a payment method that supports rebilling
- Add-on products must be subscriptions

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `purchase_id` | string | Yes | The reference order (must support rebilling) |
| `addons` | array | Yes | List of add-on products (see Addon structure below) |
| `tracking` | object | No | Tracking data (fields not provided are taken from initial purchase) |
| `placeholders` | object | No | Key-value pairs for product title and description placeholders |

### Addon Structure

| Field | Type | Required | Default | Description |
|-------|------|----------|---------|-------------|
| `product_id` | integer | Yes | - | Digistore24 product ID |
| `amount` | float | No | - | The rebilling amount of the subscription |
| `quantity` | integer | No | 1 | Quantity of the addon (minimum: 1) |
| `is_quantity_editable_after_purchase` | boolean | No | false | Can buyer change quantity after purchase |

### Tracking Structure

| Field | Type | Description |
|-------|------|-------------|
| `custom` | string | Custom value for order reference |
| `affiliate` | string | Affiliate's Digistore24 ID |
| `campaignkey` | string | Campaign key of the affiliate |
| `trackingkey` | string | Vendor's tracking key |

## Response

### Success Response (200 OK)

```json
{
  "result": "success",
  "data": {
    "created_purchase_id": "P67890",
    "payment_status": "paid",
    "payment_status_msg": "Payment successful",
    "billing_status": "completed",
    "billing_status_msg": "Order completed successfully",
    "pay_url": null
  }
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `created_purchase_id` | string | The ID of the new order |
| `payment_status` | string | The payment status code |
| `payment_status_msg` | string | Payment status in readable form |
| `billing_status` | string | Status of the new order |
| `billing_status_msg` | string | Order status in readable form |
| `pay_url` | string\|null | URL to restart payments if payment failed |

### Error Responses

#### 400 Bad Request
Invalid request parameters.

#### 403 Forbidden
- Access denied - Full access required
- Billing on demand not enabled for vendor account

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Purchase\CreateAddonChangePurchaseRequest;
use GoSuccess\Digistore24\Api\DTO\AddonData;
use GoSuccess\Digistore24\Api\DTO\TrackingData;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Create addon data
$addon1 = new AddonData(
    productId: 12345,
    amount: 29.99,
    quantity: 1,
    isQuantityEditableAfterPurchase: false
);

$addon2 = new AddonData(
    productId: 12346,
    amount: 19.99,
    quantity: 2
);

// Optional: Add tracking data
$tracking = new TrackingData();
$tracking->custom = 'order-reference-123';
$tracking->affiliate = 'AFF123';

// Create the request
$request = new CreateAddonChangePurchaseRequest(
    purchaseId: 'P12345',
    addons: [$addon1, $addon2],
    tracking: $tracking
);

try {
    $response = $ds24->purchases->createAddonChange($request);
    
    echo "New purchase created: {$response->createdPurchaseId}\n";
    echo "Payment status: {$response->paymentStatusMsg}\n";
    echo "Billing status: {$response->billingStatusMsg}\n";
    
    if ($response->payUrl !== null) {
        echo "Payment URL: {$response->payUrl}\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Important Notes

- **Billing on demand must be enabled** in your vendor settings
- The reference purchase must support rebilling (credit card, PayPal, SEPA, etc.)
- You can only add subscription products as addons
- The main product's quantity cannot be modified through this endpoint
- Tracking data not provided will be inherited from the original purchase
- Use placeholders to customize product titles and descriptions dynamically

## Related Endpoints

- [Get Purchase](getPurchase.md) - Retrieve purchase details
- [List Purchases](listPurchases.md) - List all purchases
- [Create Upgrade Purchase](createUpgradePurchase.md) - Upgrade a purchase to a different product
