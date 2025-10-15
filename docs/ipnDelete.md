# ipnDelete

Delete an IPN webhook configuration.

## Endpoint

```
POST /json/ipnDelete
```

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `ipn_id` | int | Yes | IPN ID to delete |

## Response

```php
[
    'result' => 'success',
    'data' => [
        'ipn_id' => 456,
        'deleted_at' => '2025-10-15 14:30:00'
    ]
]
```

## Usage Example

```php
use GoSuccess\Digistore24\Api\Digistore24;

$api = new Digistore24('your-api-key');

// Delete specific webhook
$response = $api->ipn()->ipnDelete(
    ipnId: 456
);

if ($response->result === 'success') {
    echo "IPN {$response->ipnId} deleted successfully";
}
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 400 | Missing ipn_id | IPN ID parameter is required |
| 404 | IPN not found | IPN does not exist |
| 403 | Access denied | Not authorized to delete IPN |

## Notes

- Deletion is permanent and cannot be undone
- No more notifications will be sent to the deleted webhook URL
- Historical trigger statistics are lost upon deletion
- Consider deactivating instead of deleting for temporary suspension
- You can recreate the same webhook configuration later if needed
