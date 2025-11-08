# listCountries

List all supported countries with codes and names.

## Endpoint

```
POST /json/listCountries
```

## Request Parameters

No parameters required.

## Response

```php
[
    'result' => 'success',
    'data' => [
        'countries' => [
            [
                'code' => 'DE',
                'name' => 'Germany',
                'name_de' => 'Deutschland',
                'name_en' => 'Germany',
                'eu_member' => true,
                'vat_rate' => 19.0
            ],
            [
                'code' => 'AT',
                'name' => 'Austria',
                'name_de' => 'Österreich',
                'name_en' => 'Austria',
                'eu_member' => true,
                'vat_rate' => 20.0
            ],
            // ... more countries
        ],
        'total' => 249
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

// Get all countries (no parameters needed)
$response = $api->countries->listCountries();

foreach ($response->countries as $country) {
    echo "{$country->code}: {$country->name}\n";
    if ($country->euMember) {
        echo "  VAT Rate: {$country->vatRate}%\n";
    }
}

// Build country selector
$countries = $response->countries;
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 500 | Server error | Internal error retrieving countries |

## Notes

- Country codes are ISO 3166-1 alpha-2
- Includes localized names (German and English)
- EU member status for VAT calculations
- VAT rates may change; cache with expiration
- Use for address forms and shipping calculations
