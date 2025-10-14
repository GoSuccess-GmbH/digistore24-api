# List Buy URLs

Returns a list of all generated buy URLs for your products.

## Endpoint

`GET /listBuyUrls`

## Description

Retrieves a list of all buy URLs that have been created for your products. This is useful for managing and tracking your customized order form links.

## Request Parameters

No parameters required.

## Response

### Success Response (200 OK)

```json
{
  "items": [
    {
      "id": 123,
      "product_id": 456,
      "url": "https://www.digistore24.com/product/123",
      "created_at": "2025-10-01T10:30:00Z",
      "modified_at": "2025-10-14T15:45:00Z"
    },
    {
      "id": 124,
      "product_id": 457,
      "url": "https://www.digistore24.com/product/124",
      "created_at": "2025-10-10T14:20:00Z",
      "modified_at": "2025-10-10T14:20:00Z"
    }
  ]
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `items` | array | List of buy URL objects |
| `items[].id` | integer | ID of the buy URL |
| `items[].product_id` | integer | Associated product ID |
| `items[].url` | string | The generated order form URL |
| `items[].created_at` | string | Creation timestamp (ISO 8601 format) |
| `items[].modified_at` | string | Last modification timestamp (ISO 8601 format) |

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\BuyUrl\ListBuyUrlsRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// List all buy URLs
$request = new ListBuyUrlsRequest();

try {
    $response = $ds24->buyUrls->list($request);
    
    echo "Found " . count($response->items) . " buy URLs:\n\n";
    
    foreach ($response->items as $buyUrl) {
        echo "ID: {$buyUrl->id}\n";
        echo "Product ID: {$buyUrl->productId}\n";
        echo "URL: {$buyUrl->url}\n";
        echo "Created: {$buyUrl->createdAt->format('Y-m-d H:i:s')}\n";
        echo "---\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Filter by Product

```php
// List and filter buy URLs for a specific product
$request = new ListBuyUrlsRequest();
$response = $ds24->buyUrls->list($request);

$productId = 456;
$filteredUrls = array_filter(
    $response->items, 
    fn($buyUrl) => $buyUrl->productId === $productId
);

echo "Buy URLs for product {$productId}:\n";
foreach ($filteredUrls as $buyUrl) {
    echo "- {$buyUrl->url}\n";
}
```

## Example: Find Recently Created URLs

```php
$request = new ListBuyUrlsRequest();
$response = $ds24->buyUrls->list($request);

// Find URLs created in the last 7 days
$sevenDaysAgo = new DateTime('-7 days');

$recentUrls = array_filter(
    $response->items,
    fn($buyUrl) => $buyUrl->createdAt >= $sevenDaysAgo
);

echo "Buy URLs created in the last 7 days: " . count($recentUrls) . "\n";
foreach ($recentUrls as $buyUrl) {
    echo "- Created: {$buyUrl->createdAt->format('Y-m-d')}, URL: {$buyUrl->url}\n";
}
```

## Important Notes

- This endpoint returns all buy URLs across all products
- No pagination is provided - all URLs are returned in a single response
- Both expired and active URLs are included in the list
- Use the `created_at` and `modified_at` timestamps to track when URLs were created or changed
- To remove old or unused URLs, use the [Delete Buy URL](deleteBuyUrl.md) endpoint

## Related Endpoints

- [Create Buy URL](createBuyUrl.md) - Create a new customized buy URL
- [Delete Buy URL](deleteBuyUrl.md) - Delete a buy URL
