# getAffiliateCommission

Get affiliate commission settings for a product.

## Endpoint

```
POST /json/getAffiliateCommission
```

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `product_id` | int | Yes | Product ID to get commission settings for |

## Response

```php
[
    'result' => 'success',
    'data' => [
        'product_id' => 12345,
        'product_name' => 'My Product',
        'commission_rate' => 50.0,
        'commission_type' => 'percentage',
        'first_level_commission' => 50.0,
        'second_level_commission' => 10.0,
        'is_affiliate_enabled' => true
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

// Get commission settings
$response = $api->affiliate()->getAffiliateCommission(
    productId: 12345
);

echo "Product: {$response->productName}\n";
echo "Commission Rate: {$response->commissionRate}%\n";
echo "First Level: {$response->firstLevelCommission}%\n";
echo "Second Level: {$response->secondLevelCommission}%\n";
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 404 | Product not found | Product does not exist |
| 403 | Access denied | Not authorized to access this product |

## Notes

- Commission rates are returned as percentages
- Second level commission is for multi-tier affiliate programs
- Use `updateAffiliateCommission` to modify settings
