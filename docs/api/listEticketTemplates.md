# List E-Ticket Templates

Lists all available e-ticket templates.

## Endpoint

`GET /listEticketTemplates`

## Description

Retrieves a list of all ticket templates configured for e-tickets in your account. Use this to get template IDs when creating e-tickets.

## Request Parameters

No parameters required.

## Response

### Success Response (200 OK)

```json
[
  {
    "id": 1234,
    "name": "Conference Ticket",
    "created_at": "2024-01-15T10:30:00Z",
    "modified_at": "2024-06-20T14:45:00Z"
  },
  {
    "id": 5678,
    "name": "VIP Seminar Pass",
    "created_at": "2024-03-10T09:15:00Z",
    "modified_at": "2024-03-10T09:15:00Z"
  }
]
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| Array of templates | array | List of template objects |
| `id` | integer | Template ID (required for creating e-tickets) |
| `name` | string | Template name |
| `created_at` | string | Template creation date (ISO 8601 format) |
| `modified_at` | string | Template last modification date (ISO 8601 format) |

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Eticket\ListEticketTemplatesRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// List all e-ticket templates
$request = new ListEticketTemplatesRequest();

try {
    $response = $ds24->etickets->listTemplates($request);
    
    echo "Available E-Ticket Templates:\n\n";
    
    foreach ($response->templates as $template) {
        echo "ID: {$template->templateId}\n";
        echo "Name: {$template->templateName}\n";
        echo "Created: {$template->createdAt?->format('Y-m-d H:i:s')}\n";
        echo "Modified: {$template->modifiedAt?->format('Y-m-d H:i:s')}\n";
        echo "---\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Find Template by Name

```php
$request = new ListEticketTemplatesRequest();
$response = $ds24->etickets->listTemplates($request);

$searchName = 'VIP';

$matchingTemplates = array_filter(
    $response->templates,
    fn($tpl) => stripos($tpl->templateName, $searchName) !== false
);

foreach ($matchingTemplates as $template) {
    echo "Found: {$template->templateName} (ID: {$template->templateId})\n";
}
```

## Example: Get Default Template

```php
// Get the first/default template for quick ticket creation
$request = new ListEticketTemplatesRequest();
$response = $ds24->etickets->listTemplates($request);

if (count($response->templates) > 0) {
    $defaultTemplate = $response->templates[0];
    echo "Using default template: {$defaultTemplate->templateName}\n";
    echo "Template ID: {$defaultTemplate->templateId}\n";
} else {
    echo "No templates available. Please create one in Digistore24 dashboard.\n";
}
```

## Example: Display as Dropdown Options

```php
// Generate HTML select options for a template picker
$request = new ListEticketTemplatesRequest();
$response = $ds24->etickets->listTemplates($request);

echo "<select name='template_id'>\n";
echo "  <option value=''>Select a template...</option>\n";

foreach ($response->templates as $template) {
    $id = htmlspecialchars($template->templateId);
    $name = htmlspecialchars($template->templateName);
    echo "  <option value='{$id}'>{$name}</option>\n";
}

echo "</select>\n";
```

## Important Notes

- Template IDs are required when creating e-tickets with `createEticket()`
- Templates define the visual appearance and layout of e-tickets
- Templates must be configured in your Digistore24 account dashboard first
- Returns only templates you have access to
- Empty array is returned if no templates are configured
- Templates can be modified in the dashboard; changes don't affect existing tickets

## Related Endpoints

- [Create E-Ticket](createEticket.md) - Create free e-tickets (requires template ID)
- [Get E-Ticket Settings](getEticketSettings.md) - Get complete e-ticket configuration
- [List E-Ticket Locations](listEticketLocations.md) - List available event locations
