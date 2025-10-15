# getBuyer

Get detailed information about a buyer.

## Endpoint

```
POST /json/getBuyer
```

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `email` | string | Yes* | Buyer's email address |
| `buyer_id` | int | Yes* | Buyer's ID |

*One of `email` or `buyer_id` is required.

## Response

```php
[
    'result' => 'success',
    'data' => [
        'buyer_id' => 12345,
        'email' => 'buyer@example.com',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'company' => 'Acme Corp',
        'street' => '123 Main St',
        'zipcode' => '12345',
        'city' => 'Berlin',
        'state' => 'Berlin',
        'country' => 'DE',
        'phone' => '+49 30 12345678',
        'language' => 'de',
        'created_at' => '2024-01-15 10:30:00',
        'total_purchases' => 5,
        'total_amount' => 499.95,
        'is_affiliate' => false
    ]
]
```

## Usage Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;

// Initialize API client
$config = new Configuration('YOUR-API-KEY');
$api = new Digistore24($config);

// Get buyer by email
$response = $api->buyer()->getBuyer(
    email: 'buyer@example.com'
);

echo "Buyer: {$response->firstName} {$response->lastName}";
echo "Total purchases: {$response->totalPurchases}";
echo "Total amount: € {$response->totalAmount}";

// Or get buyer by ID
$response = $api->buyer()->getBuyer(
    buyerId: 12345
);
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 400 | Missing parameter | Neither email nor buyer_id provided |
| 404 | Buyer not found | Buyer does not exist |
| 403 | Access denied | Not authorized to access buyer data |

## Notes

- Returns comprehensive buyer information including purchase history
- Can be used for customer support and analytics
- Supports lookup by email or buyer ID
- Includes affiliate status if applicable
