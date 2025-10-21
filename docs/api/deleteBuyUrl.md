# Delete Buy URL

Deletes a previously generated buy URL.

## Endpoint

`DELETE /deleteBuyUrl`

## Description

Deletes a BuyUrl object from your account. This is useful for:
- Removing expired or outdated buy URLs
- Cleaning up test URLs
- Managing your buy URL inventory
- Revoking access to specific order form links

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `id` | integer | Yes | ID of the BuyUrl object to delete |

## Response

### Success Response (200 OK)

```json
{
  "success": true
}
```

A successful response indicates the buy URL was deleted.

### Error Responses

#### 401 Unauthorized
Invalid or missing API key.

#### 403 Forbidden
Insufficient access rights.

#### 404 Not Found
BuyUrl with specified ID does not exist.

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\BuyUrl\DeleteBuyUrlRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Delete a buy URL
$buyUrlId = 342033068;
$request = new DeleteBuyUrlRequest(id: $buyUrlId);

try {
    $response = $ds24->buyUrls->delete($request);
    
    if ($response->success) {
        echo "Buy URL {$buyUrlId} successfully deleted\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
    echo "Buy URL not found: {$e->getMessage()}\n";
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Delete Multiple Buy URLs

```php
use GoSuccess\Digistore24\Api\Request\BuyUrl\ListBuyUrlsRequest;
use GoSuccess\Digistore24\Api\Request\BuyUrl\DeleteBuyUrlRequest;

// List all buy URLs
$listRequest = new ListBuyUrlsRequest();
$listResponse = $ds24->buyUrls->list($listRequest);

// Delete URLs older than 30 days
$thirtyDaysAgo = new DateTime('-30 days');
$deletedCount = 0;

foreach ($listResponse->items as $buyUrl) {
    if ($buyUrl->createdAt < $thirtyDaysAgo) {
        try {
            $deleteRequest = new DeleteBuyUrlRequest(id: $buyUrl->id);
            $ds24->buyUrls->delete($deleteRequest);
            $deletedCount++;
            echo "Deleted old buy URL: {$buyUrl->id}\n";
        } catch (\Exception $e) {
            echo "Failed to delete {$buyUrl->id}: {$e->getMessage()}\n";
        }
    }
}

echo "Deleted {$deletedCount} old buy URLs\n";
```

## Example: Delete by Product ID

```php
use GoSuccess\Digistore24\Api\Request\BuyUrl\ListBuyUrlsRequest;
use GoSuccess\Digistore24\Api\Request\BuyUrl\DeleteBuyUrlRequest;

// Delete all buy URLs for a specific product
$productIdToClean = 456;

$listRequest = new ListBuyUrlsRequest();
$listResponse = $ds24->buyUrls->list($listRequest);

foreach ($listResponse->items as $buyUrl) {
    if ($buyUrl->productId === $productIdToClean) {
        try {
            $deleteRequest = new DeleteBuyUrlRequest(id: $buyUrl->id);
            $ds24->buyUrls->delete($deleteRequest);
            echo "Deleted buy URL {$buyUrl->id} for product {$productIdToClean}\n";
        } catch (\Exception $e) {
            echo "Error: {$e->getMessage()}\n";
        }
    }
}
```

## Important Notes

- Once deleted, a buy URL cannot be recovered
- Any existing links to the deleted buy URL will no longer work
- The deletion is permanent and immediate
- Deleting a buy URL does not affect any orders that were already placed through that URL
- You can always create new buy URLs for the same product if needed

## Related Endpoints

- [Create Buy URL](createBuyUrl.md) - Create a new customized buy URL
- [List Buy URLs](listBuyUrls.md) - List all created buy URLs
