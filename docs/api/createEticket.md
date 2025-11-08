# Create E-Ticket

Creates free e-tickets for events.

## Endpoint

`POST /createEticket`

## Description

This endpoint allows you to create electronic tickets for events without payment. It's useful for creating complimentary tickets, staff passes, or promotional tickets.

## Request Parameters

| Parameter | Type | Required | Default | Description |
|-----------|------|----------|---------|-------------|
| `buyer` | object | Yes | - | Buyer information (see Buyer structure below) |
| `product_id` | string | Yes | - | The product ID |
| `location_id` | string | Yes | - | The location ID (see `listEticketLocations()`) |
| `template_id` | string | Yes | - | The template ID (see `listEticketTemplates()`) |
| `date` | date | Yes | - | Event date (format: YYYY-MM-DD) |
| `days` | integer | No | 1 | Number of days of the event (minimum: 1) |
| `note` | string | No | - | Optional note (e.g., event time) |
| `count` | integer | No | 1 | Number of e-tickets to create (minimum: 1) |

### Buyer Structure

| Field | Type | Required | Description |
|-------|------|----------|-------------|
| `email` | string | Yes | Email address |
| `title` | string | No | Title (e.g., "Dr.", "Prof.") |
| `salutation` | string | No | "m" (male) or "f" (female) |
| `first_name` | string | No | First name |
| `last_name` | string | No | Last name |

## Response

### Success Response (200 OK)

```json
{
  "result": "success",
  "data": {
    "etickets": [
      {
        "id": "ET12345",
        "url": "https://www.digistore24.com/eticket/ET12345.pdf",
        "email": "customer@example.com"
      },
      {
        "id": "ET12346",
        "url": "https://www.digistore24.com/eticket/ET12346.pdf",
        "email": "customer@example.com"
      }
    ]
  }
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `etickets` | array | List of created e-tickets |
| `etickets[].id` | string | ID of the created e-ticket |
| `etickets[].url` | string | URL to download the e-ticket PDF |
| `etickets[].email` | string | Email address the ticket was created for |

### Error Responses

#### 400 Bad Request
Invalid request parameters.

#### 403 Forbidden
Access denied - Full access required.

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Eticket\CreateEticketRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\BuyerData;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Create buyer data
$buyer = new BuyerData();
$buyer->email = 'customer@example.com';
$buyer->firstName = 'John';
$buyer->lastName = 'Doe';
$buyer->salutation = 'm';

// Create single e-ticket
$request = new CreateEticketRequest(
    buyer: $buyer,
    productId: '12345',
    locationId: 'LOC123',
    templateId: 'TPL456',
    date: new \DateTime('2025-12-25'),
    days: 1,
    note: 'Event starts at 18:00',
    count: 1
);

try {
    $response = $ds24->etickets->create($request);
    
    foreach ($response->etickets as $eticket) {
        echo "E-Ticket created: {$eticket->id}\n";
        echo "Download URL: {$eticket->url}\n";
        echo "Email: {$eticket->email}\n";
        echo "---\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Create Multiple Tickets

```php
// Create 5 e-tickets for the same event
$buyer = new BuyerData();
$buyer->email = 'customer@example.com';
$buyer->firstName = 'John';
$buyer->lastName = 'Doe';

$request = new CreateEticketRequest(
    buyer: $buyer,
    productId: '12345',
    locationId: 'LOC123',
    templateId: 'TPL456',
    date: new \DateTime('2025-12-25'),
    count: 5 // Create 5 tickets
);

$response = $ds24->etickets->create($request);

echo "Created {count($response->etickets)} e-tickets\n";
foreach ($response->etickets as $index => $eticket) {
    echo "Ticket " . ($index + 1) . ": {$eticket->url}\n";
}
```

## Important Notes

- **Free e-tickets only** - This endpoint creates complimentary tickets without payment
- Location and template IDs must exist (use `listEticketLocations()` and `listEticketTemplates()`)
- The `count` parameter creates multiple tickets with the same details
- Each ticket gets a unique ID and download URL
- All tickets are associated with the same buyer email
- The `note` field is useful for adding event time or special instructions
- Multi-day events can be specified with the `days` parameter
- Tickets are immediately available for download via the returned URLs

## Related Endpoints

- [Get E-Ticket](getEticket.md) - Retrieve e-ticket details
- [List E-Tickets](listEtickets.md) - List all e-tickets
- [Validate E-Ticket](validateEticket.md) - Validate an e-ticket
- [List E-Ticket Locations](listEticketLocations.md) - Get available locations
- [List E-Ticket Templates](listEticketTemplates.md) - Get available templates
- [Get E-Ticket Settings](getEticketSettings.md) - Get e-ticket configuration
