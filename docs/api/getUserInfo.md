# getUserInfo

Get current user information.

## Endpoint

```
POST /json/getUserInfo
```

## Request Parameters

No parameters required.

## Response

```php
[
    'result' => 'success',
    'data' => [
        'user_id' => 12345,
        'vendor_id' => 'VENDOR123',
        'email' => 'vendor@example.com',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'company' => 'Example Company Ltd.',
        'street' => 'Main Street 123',
        'zip' => '12345',
        'city' => 'Berlin',
        'country_code' => 'DE',
        'country_name' => 'Germany',
        'phone' => '+49 30 12345678',
        'vat_id' => 'DE123456789',
        'account_type' => 'business',
        'account_status' => 'active',
        'api_access' => true,
        'products_count' => 15,
        'total_sales' => 2456,
        'total_revenue' => 245680.00,
        'currency' => 'EUR',
        'created_at' => '2020-05-15T10:00:00Z',
        'verified_at' => '2020-05-16T14:30:00Z'
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

// Get current user information (no parameters needed)
$response = $api->users->getInfo();

echo "User ID: {$response->userId}\n";
echo "Vendor ID: {$response->vendorId}\n";
echo "Name: {$response->firstName} {$response->lastName}\n";
echo "Email: {$response->email}\n";
echo "Company: {$response->company}\n\n";

echo "Address:\n";
echo "{$response->street}\n";
echo "{$response->zip} {$response->city}\n";
echo "{$response->countryName}\n\n";

echo "Account:\n";
echo "Type: {$response->accountType}\n";
echo "Status: {$response->accountStatus}\n";
echo "API Access: " . ($response->apiAccess ? 'Yes' : 'No') . "\n\n";

echo "Statistics:\n";
echo "Products: {$response->productsCount}\n";
echo "Total Sales: {$response->totalSales}\n";
echo "Total Revenue: {$response->currency} {$response->totalRevenue}\n";

// Check account status
if ($response->accountStatus === 'active') {
    echo "\nAccount is active and verified\n";
} else {
    echo "\nWarning: Account status is {$response->accountStatus}\n";
}

// Check API access
if (!$response->apiAccess) {
    echo "Warning: API access is disabled\n";
}
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 401 | Unauthorized | Invalid API key |
| 403 | Access denied | API key does not have permission |

## Notes

- Returns information for the API key owner
- Account types: `personal`, `business`
- Account status: `active`, `suspended`, `closed`
- Statistics updated daily
- Use for account verification and dashboard displays
- VAT ID only present for business accounts in EU
