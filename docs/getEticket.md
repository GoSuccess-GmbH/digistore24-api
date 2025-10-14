# getEticket

Retrieves detailed information about a specific e-ticket.

## Description

Gets all details for a single e-ticket by its order ID. This includes information about the event, location, buyer, and validation status. This endpoint is useful for displaying ticket details, checking validation status, or managing event access.

## Endpoint

`POST /getEticket`

## Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `order_id` | string | Yes | The order ID of the e-ticket to retrieve |

## Response

The response contains detailed e-ticket information.

### Response Structure

```php
[
    'order_id' => 'ORDER123',
    'ticket_id' => 'TICKET456',
    'product_id' => '12345',
    'product_name' => 'Conference 2024',
    'location_id' => 'LOC001',
    'location_name' => 'Convention Center',
    'template_id' => 'TPL001',
    'event_date' => '2024-06-15',
    'days' => 2,
    'note' => '09:00 - 17:00',
    'buyer_email' => 'buyer@example.com',
    'buyer_first_name' => 'John',
    'buyer_last_name' => 'Doe',
    'is_validated' => false,
    'validated_at' => null,
    'created_at' => '2024-01-15 10:30:00'
]
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `order_id` | string | The order ID of the e-ticket |
| `ticket_id` | string | The unique ticket ID |
| `product_id` | string | The product ID for the event |
| `product_name` | string | The name of the event |
| `location_id` | string | The location ID |
| `location_name` | string | The readable name of the location |
| `template_id` | string | The template ID used for the ticket |
| `event_date` | string | Date of the event (ISO 8601 format) |
| `days` | int | Number of days the event lasts |
| `note` | string\|null | Optional note (e.g., time, gate information) |
| `buyer_email` | string | Email address of the ticket buyer |
| `buyer_first_name` | string | Buyer's first name |
| `buyer_last_name` | string | Buyer's last name |
| `is_validated` | bool | Whether the ticket has been validated/used |
| `validated_at` | string\|null | Date and time when ticket was validated (if validated) |
| `created_at` | string | Date and time when ticket was created |

## Example Usage

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Eticket\GetEticketRequest;

$ds24 = new Digistore24('your-api-key');

$request = new GetEticketRequest(
    orderId: 'ORDER123'
);

try {
    $response = $ds24->eticket->get($request);
    
    $ticket = $response->ticket;
    
    echo "Ticket Details:\n";
    echo "Order ID: {$ticket->orderId}\n";
    echo "Ticket ID: {$ticket->ticketId}\n";
    echo "Event: {$ticket->productName}\n";
    echo "Location: {$ticket->locationName}\n";
    echo "Date: {$ticket->eventDate->format('Y-m-d')}\n";
    echo "Duration: {$ticket->days} day(s)\n";
    
    echo "\nBuyer Information:\n";
    echo "Name: {$ticket->buyerFirstName} {$ticket->buyerLastName}\n";
    echo "Email: {$ticket->buyerEmail}\n";
    
    echo "\nValidation Status:\n";
    if ($ticket->isValidated) {
        echo "Status: Validated\n";
        echo "Validated at: {$ticket->validatedAt->format('Y-m-d H:i:s')}\n";
    } else {
        echo "Status: Not validated\n";
    }
    
    if ($ticket->note) {
        echo "\nNote: {$ticket->note}\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

## Use Cases

- **Event Check-In**: Display ticket details during event check-in
- **Ticket Verification**: Verify ticket authenticity and validation status
- **Customer Support**: Look up ticket details for customer inquiries
- **Access Control**: Check if ticket has been used before granting access
- **Reporting**: Generate reports on ticket usage and validation

## Notes

- The ticket must have been created via the `createEticket` endpoint
- `is_validated` indicates whether the ticket has been scanned/used
- `validated_at` is only set after the ticket has been validated via `validateEticket`
- The `note` field can contain additional information like event times or gate numbers

## Related Endpoints

- [createEticket](createEticket.md) - Create free e-tickets
- [listEtickets](listEtickets.md) - List all e-tickets
- [validateEticket](validateEticket.md) - Validate/scan an e-ticket
- [getEticketSettings](getEticketSettings.md) - Get e-ticket configuration
- [listEticketLocations](listEticketLocations.md) - List available locations
- [listEticketTemplates](listEticketTemplates.md) - List available templates

## Error Handling

```php
try {
    $response = $ds24->eticket->get($request);
} catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
    // E-ticket not found
    echo "Ticket not found";
} catch (\GoSuccess\Digistore24\Api\Exception\AuthenticationException $e) {
    // Invalid API key
    echo "Authentication failed";
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    // Other API error
    echo "API error: " . $e->getMessage();
}
```

## Validation Status

The `is_validated` field indicates whether the ticket has been used:

- `false`: Ticket has not been validated/scanned yet
- `true`: Ticket has been validated (entry granted)

Once validated, the `validated_at` timestamp shows exactly when the ticket was used.
