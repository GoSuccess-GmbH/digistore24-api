# ping

Test API connectivity and authentication.

## Endpoint

```
POST /json/ping
```

## Request Parameters

No parameters required.

## Response

```php
[
    'result' => 'success',
    'data' => [
        'message' => 'pong',
        'timestamp' => '2025-10-15 14:30:00',
        'api_version' => '2.0',
        'authenticated' => true
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

// Test API connection
$response = $api->system()->ping();

if ($response->message === 'pong') {
    echo "API connection successful";
    echo "Authenticated: " . ($response->authenticated ? 'Yes' : 'No');
}
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 401 | Unauthorized | Invalid or missing API key |
| 403 | Forbidden | API key is disabled or expired |
| 429 | Too many requests | Rate limit exceeded |

## Notes

- Use this endpoint to verify API connectivity
- No rate limiting on ping endpoint
- Returns server timestamp for time synchronization
- Useful for health checks and monitoring
- Does not count against API request quotas
