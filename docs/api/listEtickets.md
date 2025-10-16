# listEtickets

Lists all e-tickets with optional filtering capabilities.

## Description

Retrieves a list of all e-tickets in your account. You can filter the results by product, location, date range, or validation status. This endpoint is useful for managing event tickets, generating reports, and tracking ticket usage.

## Endpoint

`POST /listEtickets`

## Parameters

All parameters are optional. Without any filters, all e-tickets will be returned.

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `product_id` | string | No | Filter by product ID |
| `location_id` | string | No | Filter by location ID |
| `from_date` | string | No | Filter tickets with event date >= this date (Y-m-d format) |
| `to_date` | string | No | Filter tickets with event date <= this date (Y-m-d format) |
| `only_validated` | string | No | Filter by validation status: 'y' for validated only, 'n' for unvalidated only |

## Response

The response contains an array of e-tickets and the total count.

### Response Structure

```php
[
    'tickets' => [
        [
            'order_id' => 'ORDER123',
            'ticket_id' => 'TICKET456',
            'product_id' => '12345',
            'product_name' => 'Conference 2024',
            'location_id' => 'LOC001',
            'location_name' => 'Convention Center',
            'event_date' => '2024-06-15',
            'days' => 2,
            'buyer_email' => 'buyer@example.com',
            'buyer_first_name' => 'John',
            'buyer_last_name' => 'Doe',
            'is_validated' => false,
            'validated_at' => null,
            'created_at' => '2024-01-15 10:30:00'
        ],
        // ... more tickets
    ],
    'total_count' => 100
]
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `tickets` | array | Array of e-ticket objects |
| `total_count` | int | Total number of tickets matching the filter |

### Ticket Object Fields

| Field | Type | Description |
|-------|------|-------------|
| `order_id` | string | The order ID of the e-ticket |
| `ticket_id` | string | The unique ticket ID |
| `product_id` | string | The product ID for the event |
| `product_name` | string | The name of the event |
| `location_id` | string | The location ID |
| `location_name` | string | The readable name of the location |
| `event_date` | string | Date of the event (ISO 8601 format) |
| `days` | int | Number of days the event lasts |
| `buyer_email` | string | Email address of the ticket buyer |
| `buyer_first_name` | string | Buyer's first name |
| `buyer_last_name` | string | Buyer's last name |
| `is_validated` | bool | Whether the ticket has been validated/used |
| `validated_at` | string\|null | Date and time when ticket was validated |
| `created_at` | string | Date and time when ticket was created |

## Example Usage

### List All E-Tickets

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;

// Initialize API client
$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// No request object needed for listing all e-tickets
try {
    $response = $ds24->etickets->list();
    
    echo "Total tickets: {$response->totalCount}\n";
    echo "Showing: " . count($response->tickets) . " tickets\n\n";
    
    foreach ($response->tickets as $ticket) {
        echo "Ticket ID: {$ticket->ticketId}\n";
        echo "Event: {$ticket->productName}\n";
        echo "Location: {$ticket->locationName}\n";
        echo "Date: {$ticket->eventDate->format('Y-m-d')}\n";
        echo "Buyer: {$ticket->buyerFirstName} {$ticket->buyerLastName}\n";
        echo "Validated: " . ($ticket->isValidated ? 'Yes' : 'No') . "\n\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

### Filter by Product

```php
$request = new ListEticketsRequest(
    productId: '12345'
);

$response = $ds24->eticket->list($request);

echo "Tickets for product 12345: {$response->totalCount}\n";
```

### Filter by Date Range

```php
$request = new ListEticketsRequest(
    fromDate: new \DateTimeImmutable('2024-06-01'),
    toDate: new \DateTimeImmutable('2024-06-30')
);

$response = $ds24->eticket->list($request);

echo "Tickets for June 2024: {$response->totalCount}\n";
```

### Filter by Location

```php
$request = new ListEticketsRequest(
    locationId: 'LOC001'
);

$response = $ds24->eticket->list($request);

echo "Tickets at location LOC001: {$response->totalCount}\n";
```

### Filter Only Validated Tickets

```php
$request = new ListEticketsRequest(
    onlyValidated: true
);

$response = $ds24->eticket->list($request);

echo "Already used tickets: {$response->totalCount}\n";
```

### Combine Multiple Filters

```php
$request = new ListEticketsRequest(
    productId: '12345',
    locationId: 'LOC001',
    fromDate: new \DateTimeImmutable('2024-06-01'),
    toDate: new \DateTimeImmutable('2024-06-30'),
    onlyValidated: false
);

$response = $ds24->eticket->list($request);

echo "Unused tickets for product 12345 at LOC001 in June: {$response->totalCount}\n";
```

## Use Cases

- **Event Management**: Get overview of all tickets for an event
- **Access Control**: Find unvalidated tickets that haven't been used yet
- **Reporting**: Generate reports on ticket sales and usage
- **Location Management**: See which tickets are for specific venues
- **Date Planning**: Filter tickets by event dates
- **Customer Support**: Search for tickets by buyer or order information

## Notes

- Results may be paginated if there are many tickets (check API documentation for pagination details)
- `total_count` shows the total number of matching tickets, which may be more than the returned results
- Date filters use the `event_date` field, not the `created_at` field
- The `only_validated` filter helps distinguish between used and unused tickets
- Combine multiple filters to narrow down results precisely

## Related Endpoints

- [createEticket](createEticket.md) - Create free e-tickets
- [getEticket](getEticket.md) - Get details of a specific e-ticket
- [validateEticket](validateEticket.md) - Validate/scan an e-ticket
- [getEticketSettings](getEticketSettings.md) - Get e-ticket configuration
- [listEticketLocations](listEticketLocations.md) - List available locations
- [listEticketTemplates](listEticketTemplates.md) - List available templates

## Error Handling

```php
try {
    $response = $ds24->eticket->list($request);
} catch (\GoSuccess\Digistore24\Api\Exception\AuthenticationException $e) {
    // Invalid API key
    echo "Authentication failed";
} catch (\GoSuccess\Digistore24\Api\Exception\ValidationException $e) {
    // Invalid filter parameters
    echo "Invalid parameters: " . $e->getMessage();
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    // Other API error
    echo "API error: " . $e->getMessage();
}
```

## Pagination

If you have a large number of tickets, the API may paginate the results. The `total_count` field indicates the total number of matching tickets across all pages. Check the Digistore24 API documentation for pagination parameters like `page` and `per_page` if needed.
