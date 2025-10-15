# ipnSetup

Setup IPN (Instant Payment Notification) webhook for purchase events.

## Endpoint

```
POST /json/ipnSetup
```

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `url` | string | Yes | Webhook URL to receive notifications |
| `event` | string | Yes | Event type: 'on_payment', 'on_refund', 'on_rebilling', etc. |
| `product_id` | int | No | Specific product ID (empty = all products) |
| `is_active` | bool | No | Active status (default: true) |

## Response

```php
[
    'result' => 'success',
    'data' => [
        'ipn_id' => 456,
        'url' => 'https://yoursite.com/webhook',
        'event' => 'on_payment',
        'product_id' => null,
        'is_active' => true,
        'created_at' => '2025-10-15 14:30:00',
        'secret' => 'abc123...xyz' // For request verification
    ]
]
```

## Usage Example

```php
use GoSuccess\Digistore24\Api\Digistore24;

$api = new Digistore24('your-api-key');

// Setup webhook for all payments
$response = $api->ipn()->ipnSetup(
    url: 'https://yoursite.com/webhook/payment',
    event: 'on_payment'
);

echo "IPN ID: {$response->ipnId}";
echo "Secret: {$response->secret}"; // Save this for verification!

// Setup webhook for specific product
$response = $api->ipn()->ipnSetup(
    url: 'https://yoursite.com/webhook/product123',
    event: 'on_payment',
    productId: 123
);

// Setup refund notifications
$response = $api->ipn()->ipnSetup(
    url: 'https://yoursite.com/webhook/refund',
    event: 'on_refund'
);
```

## Available Events

- `on_payment` - New payment received
- `on_payment_pending` - Payment pending
- `on_rebilling` - Subscription rebilling
- `on_refund` - Payment refunded
- `on_chargeback` - Chargeback initiated
- `on_cancellation` - Subscription cancelled

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 400 | Invalid URL | Webhook URL is invalid or unreachable |
| 422 | Invalid event | Event type not supported |
| 409 | IPN already exists | Webhook already configured for this URL/event |

## Notes

- Webhook URL must be publicly accessible via HTTPS
- Save the returned `secret` for verifying webhook requests
- Each URL/event combination can only be registered once
- Test your webhook endpoint before activating
- Digistore24 will retry failed webhooks up to 5 times
- Webhook payload is JSON with purchase/transaction data
