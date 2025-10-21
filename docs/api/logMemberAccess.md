# Log Member Access

Notifies Digistore24 that a buyer has logged into their membership account and accessed the bought content.

## Endpoint

`POST /logMemberAccess`

## Description

This endpoint is important for German refund handling. It should only be used for purchases without the option to refund (`refund_days=0` in IPN). Only call this function if the buyer actually has logged in.

## Use Case

Track member access to content for legal refund compliance in Germany. This helps document that a customer has actively accessed purchased content, which can affect refund eligibility.

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `purchase_id` | string | Yes | The ID of the purchase |
| `platform_name` | string | Yes | The readable name of the membership area (e.g., "VIP Club") |
| `login_name` | string | Yes | The buyer's username for the membership area |
| `login_url` | string | Yes | The URL the buyer used to login |
| `number_of_unlocked_lectures` | integer | Yes | Number of lectures the member has access to for this purchase (minimum: 0) |
| `total_number_of_lectures` | integer | Yes | Total number of lectures in the course (unlocked + locked, minimum: 0) |
| `login_at` | datetime | No | Date time of login. Defaults to 'now'. Use for batch logging. |

## Response

### Success Response (200 OK)

```json
{
  "result": "success",
  "data": {
    "success": true,
    "message": "Member access successfully logged"
  }
}
```

### Error Responses

#### 400 Bad Request
Invalid request parameters.

#### 403 Forbidden
Access denied - Full access required.

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\AccountAccess\LogMemberAccessRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Log member access
$request = new LogMemberAccessRequest(
    purchaseId: 'P12345',
    platformName: 'VIP Club',
    loginName: 'john.doe',
    loginUrl: 'https://example.com/login',
    numberOfUnlockedLectures: 5,
    totalNumberOfLectures: 10,
    loginAt: new \DateTime('now') // Optional
);

try {
    $response = $ds24->accountAccess->logAccess($request);
    
    if ($response->success) {
        echo "Member access logged successfully\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Important Notes

- **Only use this for non-refundable purchases** (`refund_days=0`)
- Only log actual logins, not page views or other activity
- Useful for German legal compliance regarding refunds
- The `login_at` parameter allows batch processing of historical logins
- Both lecture counts must be non-negative integers
- The platform name should be user-friendly and descriptive

## Related Endpoints

- [List Account Access](listAccountAccess.md) - List all logged member accesses
