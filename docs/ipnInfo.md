# ipnInfo

Get information about configured IPN webhooks.

## Endpoint

```
POST /json/ipnInfo
```

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `ipn_id` | int | No | Specific IPN ID (empty = list all) |

## Response

```php
[
    'result' => 'success',
    'data' => [
        'ipns' => [
            [
                'ipn_id' => 456,
                'url' => 'https://yoursite.com/webhook',
                'event' => 'on_payment',
                'product_id' => null,
                'is_active' => true,
                'created_at' => '2025-10-15 14:30:00',
                'last_triggered' => '2025-10-15 16:45:00',
                'total_triggers' => 150,
                'failed_triggers' => 2
            ],
            // ... more IPNs
        ]
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

// List all configured webhooks
$response = $api->ipn()->ipnInfo();

foreach ($response->ipns as $ipn) {
    echo "IPN {$ipn->ipnId}: {$ipn->url}\n";
    echo "Event: {$ipn->event}\n";
    echo "Triggers: {$ipn->totalTriggers} (Failed: {$ipn->failedTriggers})\n";
}

// Get specific IPN
$response = $api->ipn()->ipnInfo(
    ipnId: 456
);

echo "Webhook URL: {$response->ipns[0]->url}";
echo "Status: " . ($response->ipns[0]->isActive ? 'Active' : 'Inactive');
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 404 | IPN not found | Specified IPN ID does not exist |
| 403 | Access denied | Not authorized to access IPN info |

## Notes

- Without `ipn_id` parameter, returns all configured IPNs
- Use this to monitor webhook health and trigger statistics
- Failed triggers indicate your webhook endpoint is not responding
- If failed_triggers is high, check your webhook implementation
- Last triggered timestamp helps identify inactive webhooks
