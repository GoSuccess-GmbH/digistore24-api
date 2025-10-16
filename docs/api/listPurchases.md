# List Purchases

Returns a list of your sales including those where you receive commission.

## Endpoint

`GET /listPurchases`

## Description

Retrieves a filtered list of purchases/orders with flexible search criteria. Supports pagination, date ranges, and various filters for sales analysis and reporting.

## Request Parameters

| Parameter | Type | Required | Default | Description |
|-----------|------|----------|---------|-------------|
| `from` | string | No | -24h | Start time (e.g., "2014-02-28 23:11:24", "now", "-3d", "start") |
| `to` | string | No | now | End time |
| `search` | object | No | - | Search criteria (see below) |
| `sort_by` | string | No | date | Sort by: date, earning, amount |
| `sort_order` | string | No | asc | Sort order: asc, desc |
| `load_transactions` | boolean | No | false | Include transaction list for each purchase |
| `page_no` | integer | No | 1 | Page number (starts at 1) |
| `page_size` | integer | No | 500 | Items per page (min: 1) |

### Search Criteria

| Field | Type | Description |
|-------|------|-------------|
| `role` | string | Filter by role: vendor, affiliate, other (comma separated) |
| `product_id` | string | Filter by product IDs (comma separated) |
| `first_name` | string | Filter by buyer first name |
| `last_name` | string | Filter by buyer last name |
| `email` | string | Filter by buyer email |
| `has_affiliate` | boolean | Filter purchases with/without affiliate |
| `affiliate_name` | string | Filter by affiliate name |
| `order_type` | string | live or test |
| `pay_method` | string | Payment methods (comma separated) |
| `billing_type` | string | Billing types (comma separated) |
| `transaction_type` | string | Transaction types (comma separated) |
| `currency` | string | Filter by currency |
| `purchase_id` | string | Filter by purchase IDs (comma separated) |

## Response

### Success Response (200 OK)

```json
{
  "purchase_list": [
    {
      "id": "ABC123",
      "amount": 99.00,
      "currency": "EUR",
      "billing_type": "single_payment",
      "billing_status": "completed",
      "created_at": "2025-10-14T10:30:00Z",
      "buyer_email": "customer@example.com",
      "product_name": "Premium Course",
      "click_id": "CLICK789",
      "sub_ids": {
        "sid1": "campaign1",
        "sid2": "source2"
      }
    }
  ]
}
```

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Purchase\ListPurchasesRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Simple: List all purchases (no parameters needed)
try {
    $response = $ds24->purchases->list();
    
    echo "Found " . count($response->purchases) . " purchases\n\n";
    
    foreach ($response->purchases as $purchase) {
        echo "ID: {$purchase->purchaseId}\n";
        echo "Amount: {$purchase->amount} {$purchase->currency}\n";
        echo "Buyer: {$purchase->buyerEmail}\n";
        echo "Product: {$purchase->productName}\n";
        echo "Status: {$purchase->billingStatus}\n";
        echo "---\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}

// Advanced: List purchases from last 7 days with filters
$request = new ListPurchasesRequest(
    fromDate: new DateTime('-7 days'),
    toDate: new DateTime('now')
);

$response = $ds24->purchases->list($request);
```

## Example: Filter by Product and Email

```php
// List purchases for specific product and buyer
$request = new ListPurchasesRequest(
    productId: '39',
    buyerEmail: 'customer@example.com'
);

$response = $ds24->purchases->list($request);
echo "Customer has " . count($response->purchases) . " purchases\n";
```

## Example: Export Sales Report

```php
// Generate sales report for last month
$request = new ListPurchasesRequest(
    fromDate: new DateTime('-30 days'),
    toDate: new DateTime('now')
);

$response = $ds24->purchases->list($request);

$totalRevenue = 0;
$currencies = [];

foreach ($response->purchases as $purchase) {
    $totalRevenue += $purchase->amount;
    $currencies[$purchase->currency] = ($currencies[$purchase->currency] ?? 0) + $purchase->amount;
}

echo "Total Purchases: " . count($response->purchases) . "\n";
echo "Revenue by Currency:\n";
foreach ($currencies as $currency => $amount) {
    echo "  {$currency}: " . number_format($amount, 2) . "\n";
}
```

## Important Notes

- Default time range is last 24 hours
- Maximum page size depends on account settings
- Use pagination for large datasets
- Affiliate purchases include `click_id` and `sub_ids`
- Set `load_transactions=true` for detailed transaction data
- Date formats: ISO 8601, relative (e.g., "-3d"), or keywords ("now", "start")

## Related Endpoints

- [Get Purchase](getPurchase.md) - Get detailed information about specific purchase(s)
- [Create Buy URL](createBuyUrl.md) - Create customized order URL
