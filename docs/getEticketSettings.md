# Get E-Ticket Settings

Returns e-ticket configuration including templates and locations for your Digistore24 account.

## Endpoint

`GET /getEticketSettings`

## Description

Retrieves the complete e-ticket configuration for your account, including all available templates and event locations. This is essential for setting up e-tickets as you need template and location IDs when creating e-tickets.

## Request Parameters

No parameters required.

## Response

### Success Response (200 OK)

```json
{
  "eticket_owners": {
    "123": "my_own_digistore_id",
    "456": "some_other_vendor_digistore_id"
  },
  "eticket_templates": {
    "123": {
      "1234": "Some seminar",
      "5678": "Some other seminar"
    },
    "456": {
      "9876": "A seminar by some other vendor",
      "5432": "Another seminar by some other vendor"
    }
  },
  "eticket_locations": {
    "123": {
      "5432": "Berlin",
      "4321": "Münster/Prinzipialmarkt"
    },
    "456": {
      "8765": "München",
      "7654": "Köln"
    }
  }
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `eticket_owners` | object | Mapping of Digistore24 IDs to owner names |
| `eticket_templates` | object | Templates grouped by owner ID, each template has ID and name |
| `eticket_locations` | object | Locations grouped by owner ID, each location has ID and name |

### Error Responses

#### 401 Unauthorized
Invalid or missing API key.

#### 403 Forbidden
Insufficient access rights.

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Eticket\GetEticketSettingsRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Get e-ticket settings
$request = new GetEticketSettingsRequest();

try {
    $response = $ds24->etickets->getSettings($request);
    
    echo "E-Ticket Configuration:\n\n";
    
    // Display settings
    if ($response->eticketEnabled) {
        echo "E-Tickets are enabled\n";
        echo "Default Location ID: {$response->defaultLocationId}\n";
        echo "Default Template ID: {$response->defaultTemplateId}\n";
        echo "Max Tickets Per Order: {$response->maxTicketsPerOrder}\n";
        echo "Email Validation Required: " . ($response->requireEmailValidation ? 'Yes' : 'No') . "\n";
    } else {
        echo "E-Tickets are not enabled for this account\n";
    }
    
    if ($response->settings) {
        echo "\nAdditional Settings:\n";
        print_r($response->settings);
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Find Available Templates and Locations

```php
$request = new GetEticketSettingsRequest();
$response = $ds24->etickets->getSettings($request);

// Parse templates from settings
echo "Available Templates:\n";
if (isset($response->settings['eticket_templates'])) {
    foreach ($response->settings['eticket_templates'] as $ownerId => $templates) {
        foreach ($templates as $templateId => $templateName) {
            echo "- Template ID: {$templateId}, Name: {$templateName}\n";
        }
    }
}

echo "\nAvailable Locations:\n";
if (isset($response->settings['eticket_locations'])) {
    foreach ($response->settings['eticket_locations'] as $ownerId => $locations) {
        foreach ($locations as $locationId => $locationName) {
            echo "- Location ID: {$locationId}, Name: {$locationName}\n";
        }
    }
}
```

## Important Notes

- This endpoint returns configuration for all e-ticket owners in your account
- Template and location IDs are required when creating e-tickets
- Settings are grouped by owner (vendor) Digistore24 ID
- Use `listEticketTemplates()` and `listEticketLocations()` for simpler lists
- Configuration changes in the Digistore24 dashboard are reflected immediately

## Related Endpoints

- [Create E-Ticket](createEticket.md) - Create free e-tickets
- [List E-Ticket Locations](listEticketLocations.md) - Get a simple list of locations
- [List E-Ticket Templates](listEticketTemplates.md) - Get a simple list of templates
