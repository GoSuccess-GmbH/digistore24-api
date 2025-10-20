# getAffiliateCommission

Get affiliate commission settings for one or more products.

## Endpoint

```
GET /json/getAffiliateCommission
```

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `affiliate_id` | string | Yes | Affiliate ID to get commission settings for |
| `product_ids` | string | No | Product IDs (comma-separated) or "all" for all products (default: "all") |

## Response

```json
{
    "api_version": "1.2",
    "current_time": "2025-10-20 13:03:47",
    "timezone": "CEST",
    "utc_offset": "7200",
    "runtime_seconds": "0.0",
    "result": "success",
    "data": {
        "affiliations": [
            {
                "commission_rate": "50.00",
                "commission_currency": "EUR",
                "default_commission_rate": "50.00",
                "default_commission_fix": "0.00",
                "default_commission_currency": "EUR",
                "commission_fix": "0.00",
                "is_on_first_pmnt_only": "",
                "product_id": "406040",
                "product_is_active": "Y",
                "approval_status": "approved",
                "approval_status_msg": "Genehmigt"
            }
        ],
        "affiliate_id": "918",
        "affiliate_name": "GoSuccess"
    }
}
```

## Response Fields

### Root Data

| Field | Type | Description |
|-------|------|-------------|
| `affiliations` | array | Array of affiliation commission data |
| `affiliate_id` | string | Affiliate ID |
| `affiliate_name` | string | Affiliate name |

### Affiliation Object

| Field | Type | Description |
|-------|------|-------------|
| `commission_rate` | string | Commission rate as percentage |
| `commission_currency` | string | Currency code for commission |
| `default_commission_rate` | string | Default commission rate as percentage |
| `default_commission_fix` | string | Default fixed commission amount |
| `default_commission_currency` | string | Default commission currency code |
| `commission_fix` | string | Fixed commission amount |
| `is_on_first_pmnt_only` | string | Whether commission applies only to first payment (Y/N or empty) |
| `product_id` | string | Product ID |
| `product_is_active` | string | Whether product is active (Y/N) |
| `approval_status` | string | Approval status: "new", "approved", "rejected", "pending" |
| `approval_status_msg` | string | Human-readable approval status message |

## Usage Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Affiliate\GetAffiliateCommissionRequest;

// Initialize API client
$config = new Configuration('YOUR-API-KEY');
$api = new Digistore24($config);

// Get commission settings for all products
$request = new GetAffiliateCommissionRequest(
    affiliateId: 'GoSuccess',
    productIds: 'all'
);
$response = $api->affiliate()->getCommission($request);

echo "Affiliate: {$response->affiliateName} (ID: {$response->affiliateId})\n";
echo "Total Products: " . count($response->affiliations) . "\n\n";

foreach ($response->affiliations as $affiliation) {
    echo "Product {$affiliation->productId}:\n";
    echo "  Commission: {$affiliation->commissionRate}% {$affiliation->commissionCurrency}\n";
    echo "  Status: {$affiliation->approvalStatus->value} - {$affiliation->approvalStatusMsg}\n";
    echo "  Active: " . ($affiliation->productIsActive ? 'Yes' : 'No') . "\n\n";
}

// Get commission settings for specific products
$request = new GetAffiliateCommissionRequest(
    affiliateId: 'GoSuccess',
    productIds: '406040,406042,406043'
);
$response = $api->affiliate()->getCommission($request);
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 404 | Affiliate not found | Affiliate does not exist |
| 403 | Access denied | Not authorized to access this affiliate |

## Notes

- Commission rates are returned as decimal strings (e.g., "50.00")
- Use `product_ids=all` to retrieve all products
- Use comma-separated product IDs for specific products
- Empty `default_commission_currency` means no default currency is set
- Empty `is_on_first_pmnt_only` is treated as false (commission on all payments)
- Use `updateAffiliateCommission` to modify settings
