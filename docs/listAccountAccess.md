# listAccountAccess

Lists all logged member accesses for a specific purchase.

## Description

Retrieves the history of all logged member accesses for a purchase. This provides information about when and how buyers have accessed their membership content. This data is important for compliance with German refund regulations and for tracking member engagement.

## Endpoint

`POST /listAccountAccess`

## Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `purchase_id` | string | Yes | The ID of the purchase to list accesses for |

## Response

The response contains an array of access log entries.

### Response Structure

```php
[
    'accesses' => [
        [
            'platform_name' => 'VIP Club',
            'login_name' => 'john.doe',
            'login_url' => 'https://example.com/login',
            'number_of_unlocked_lectures' => 10,
            'total_number_of_lectures' => 20,
            'login_at' => '2024-01-15 10:30:00'
        ],
        // ... more entries
    ]
]
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `platform_name` | string | Readable name of the membership area |
| `login_name` | string | Buyer's username for the membership area |
| `login_url` | string | URL the buyer used to login |
| `number_of_unlocked_lectures` | int | Number of lectures the member has access to |
| `total_number_of_lectures` | int | Total number of lectures in the course |
| `login_at` | string | Date and time of the login (ISO 8601 format) |

## Example Usage

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\AccountAccess\ListAccountAccessRequest;

$ds24 = new Digistore24('your-api-key');

$request = new ListAccountAccessRequest(
    purchaseId: 'ABC123XYZ'
);

try {
    $response = $ds24->accountAccess->listAccesses($request);
    
    echo "Found " . count($response->accesses) . " access log entries\n";
    
    foreach ($response->accesses as $access) {
        echo sprintf(
            "%s logged in to %s at %s\n",
            $access->loginName,
            $access->platformName,
            $access->loginAt->format('Y-m-d H:i:s')
        );
        echo sprintf(
            "  Progress: %d/%d lectures unlocked\n",
            $access->numberOfUnlockedLectures,
            $access->totalNumberOfLectures
        );
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

## Use Cases

- **Compliance Tracking**: Track member accesses for German refund regulations
- **Engagement Analytics**: Monitor how actively members access content
- **Support**: Verify member access history when troubleshooting issues
- **Reporting**: Generate usage reports for course creators

## Notes

- Access entries are logged via the `logMemberAccess` endpoint
- Only accesses that were explicitly logged will be returned
- Entries are typically sorted by `login_at` in descending order (most recent first)
- Empty result indicates no logged accesses for this purchase

## Related Endpoints

- [logMemberAccess](logMemberAccess.md) - Log a member access to content
- [getPurchase](getPurchase.md) - Get purchase details

## Error Handling

```php
try {
    $response = $ds24->accountAccess->listAccesses($request);
} catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
    // Purchase not found
} catch (\GoSuccess\Digistore24\Api\Exception\AuthenticationException $e) {
    // Invalid API key
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    // Other API error
}
```
