# Get Purchase

Returns detailed information about one or more orders/purchases.

## Endpoint

`GET /getPurchase`

## Description

Retrieves complete details for a purchase including buyer information, items, transactions, billing status, and more. Can fetch single or multiple purchases at once.

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `purchase_id` | string | Yes | Single Digistore24 order ID or comma-separated list of order IDs |

## Response

### Success Response (200 OK)

For single purchase:
```json
{
  "id": "ABC123",
  "amount": 99.00,
  "currency": "EUR",
  "billing_type": "single_payment",
  "billing_status": "completed",
  "created_at": "2025-10-14T10:30:00Z",
  "buyer": {
    "id": 12345,
    "email": "customer@example.com",
    "first_name": "John",
    "last_name": "Doe"
  },
  "items": [
    {
      "product_id": 39,
      "product_name": "The Weight Loss Cake",
      "quantity": 1
    }
  ],
  "transaction_list": [
    {
      "id": 98765,
      "amount": 99.00,
      "type": "payment",
      "created_at": "2025-10-14T10:30:00Z"
    }
  ]
}
```

For multiple purchases, returns an object with purchase IDs as keys.

### Key Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `id` | string | Purchase/Order ID |
| `amount` | number | Purchase amount |
| `currency` | string | Currency code (EUR, USD, etc.) |
| `billing_type` | string | single_payment, subscription, installment |
| `billing_status` | string | paying, completed, aborted, unpaid, reminding |
| `buyer` | object | Buyer information (id, email, name, address) |
| `items` | array | Purchased products |
| `transaction_list` | array | Payment transactions |
| `has_etickets` | string | Y/N - Whether purchase includes e-tickets |
| `invoice_url` | string | URL to download invoice |
| `receipt_url` | string | URL to download receipt |

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Purchase\GetPurchaseRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Get single purchase
$request = new GetPurchaseRequest(purchaseId: 'ABC123');

try {
    $response = $ds24->purchases->get($request);
    
    echo "Purchase ID: {$response->purchaseId}\n";
    echo "Amount: {$response->amount} {$response->currency}\n";
    echo "Status: {$response->billingStatus}\n";
    echo "Buyer: {$response->buyerEmail}\n";
    echo "Product: {$response->productName}\n";
    
    if ($response->createdAt) {
        echo "Date: {$response->createdAt->format('Y-m-d H:i:s')}\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Get Multiple Purchases

```php
// Fetch multiple purchases at once
$request = new GetPurchaseRequest(purchaseId: 'ABC123,DEF456,GHI789');
$response = $ds24->purchases->get($request);

// Response will contain multiple purchases
foreach ($response->additionalData as $purchaseId => $purchaseData) {
    echo "Purchase {$purchaseId}: {$purchaseData['amount']} {$purchaseData['currency']}\n";
}
```

## Important Notes

- Can fetch single or multiple purchases in one request
- Contains complete purchase details including all transactions
- Buyer information includes full address if provided
- Invoice and receipt URLs are included for completed orders
- Use for order verification, customer support, and accounting

## Related Endpoints

- [List Purchases](listPurchases.md) - List purchases with filtering
- [Create Buy URL](createBuyUrl.md) - Create order URL
