# List E-Ticket Locations

Lists all available e-ticket event locations.

## Endpoint

`GET /listEticketLocations`

## Description

Retrieves a simple list of all event locations configured for e-tickets in your account. Use this to get location IDs when creating e-tickets.

## Request Parameters

No parameters required.

## Response

### Success Response (200 OK)

```json
[
  {
    "id": 5432,
    "name": "Berlin Conference Center",
    "address": "Alexanderplatz 1, 10178 Berlin"
  },
  {
    "id": 4321,
    "name": "Münster Event Hall",
    "address": "Prinzipialmarkt 10, 48143 Münster"
  }
]
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| Array of locations | array | List of location objects |
| `id` | integer | Location ID (required for creating e-tickets) |
| `name` | string | Location name |
| `address` | string | Location address |

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// List all e-ticket locations (no parameters needed)
try {
    $response = $ds24->etickets->listLocations();

    echo "Available E-Ticket Locations:\n\n";

    foreach ($response->locations as $location) {
        echo "ID: {$location->locationId}\n";
        echo "Name: {$location->locationName}\n";
        echo "Address: {$location->address}\n";
        echo "---\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Find Location by Name

```php
// No request object needed
$response = $ds24->etickets->listLocations();

$searchName = 'Berlin';

$matchingLocations = array_filter(
    $response->locations,
    fn($loc) => stripos($loc->locationName, $searchName) !== false
);

foreach ($matchingLocations as $location) {
    echo "Found: {$location->locationName} (ID: {$location->locationId})\n";
}
```

## Example: Display as Dropdown Options

```php
// Generate HTML select options for a location picker
$request = new ListEticketLocationsRequest();
$response = $ds24->etickets->listLocations($request);

echo "<select name='location_id'>\n";
echo "  <option value=''>Select a location...</option>\n";

foreach ($response->locations as $location) {
    $id = htmlspecialchars($location->locationId);
    $name = htmlspecialchars($location->locationName);
    echo "  <option value='{$id}'>{$name}</option>\n";
}

echo "</select>\n";
```

## Important Notes

- Location IDs are required when creating e-tickets with `createEticket()`
- Locations must be configured in your Digistore24 account dashboard first
- Returns only locations you have access to
- Empty array is returned if no locations are configured

## Related Endpoints

- [Create E-Ticket](createEticket.md) - Create free e-tickets (requires location ID)
- [Get E-Ticket Settings](getEticketSettings.md) - Get complete e-ticket configuration
- [List E-Ticket Templates](listEticketTemplates.md) - List available ticket templates
