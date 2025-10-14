# Delete Image

Deletes an image from your Digistore24 account.

## Endpoint

`DELETE /deleteImage`

## Description

Permanently removes an image from your Digistore24 account. Use this to clean up unused images, remove outdated assets, or manage your image library.

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `image_id` | integer | Yes | ID of the image to delete |

## Response

### Success Response (200 OK)

```json
{
  "success": true
}
```

A successful response indicates the image was permanently deleted.

### Error Responses

#### 401 Unauthorized
Invalid or missing API key.

#### 403 Forbidden
Insufficient access rights.

#### 404 Not Found
Image with specified ID does not exist.

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Image\DeleteImageRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Delete an image
$imageId = 'IMG12345';
$request = new DeleteImageRequest(imageId: $imageId);

try {
    $response = $ds24->images->delete($request);
    
    if ($response->success) {
        echo "Image {$imageId} successfully deleted\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
    echo "Image not found: {$e->getMessage()}\n";
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Delete Multiple Images

```php
use GoSuccess\Digistore24\Api\Request\Image\ListImagesRequest;
use GoSuccess\Digistore24\Api\Request\Image\DeleteImageRequest;

// List all product images
$listRequest = new ListImagesRequest(usageType: 'product');
$listResponse = $ds24->images->list($listRequest);

// Delete images matching a pattern
$patternToDelete = 'old-product';
$deletedCount = 0;

foreach ($listResponse->images as $image) {
    if (stripos($image->name, $patternToDelete) !== false) {
        try {
            $deleteRequest = new DeleteImageRequest(imageId: $image->id);
            $ds24->images->delete($deleteRequest);
            $deletedCount++;
            echo "Deleted: {$image->name} (ID: {$image->id})\n";
        } catch (\Exception $e) {
            echo "Failed to delete {$image->id}: {$e->getMessage()}\n";
        }
    }
}

echo "\nDeleted {$deletedCount} images\n";
```

## Example: Clean Up Unused Images

```php
// Strategy: Delete images that are not referenced in products
// Note: You would need to implement your own logic to track which images are in use

$imagesToKeep = [
    'IMG12345',
    'IMG67890',
    // ... IDs of images currently in use
];

$listRequest = new ListImagesRequest(usageType: 'product');
$listResponse = $ds24->images->list($listRequest);

foreach ($listResponse->images as $image) {
    if (!in_array($image->id, $imagesToKeep)) {
        try {
            $deleteRequest = new DeleteImageRequest(imageId: $image->id);
            $ds24->images->delete($deleteRequest);
            echo "Deleted unused image: {$image->name}\n";
        } catch (\Exception $e) {
            echo "Error deleting {$image->id}: {$e->getMessage()}\n";
        }
    }
}
```

## Example: Safe Delete with Confirmation

```php
// Safely delete an image with confirmation
function deleteImageSafely(Digistore24 $ds24, string $imageId): bool
{
    // First, verify the image exists
    try {
        $getRequest = new GetImageRequest(imageId: $imageId);
        $image = $ds24->images->get($getRequest);
        
        echo "About to delete image:\n";
        echo "- ID: {$image->imageId}\n";
        echo "- URL: {$image->imageUrl}\n";
        
        // Confirm deletion
        echo "Are you sure? (yes/no): ";
        $confirmation = trim(fgets(STDIN));
        
        if (strtolower($confirmation) !== 'yes') {
            echo "Deletion cancelled.\n";
            return false;
        }
        
        // Proceed with deletion
        $deleteRequest = new DeleteImageRequest(imageId: $imageId);
        $ds24->images->delete($deleteRequest);
        
        echo "Image successfully deleted.\n";
        return true;
        
    } catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
        echo "Image not found.\n";
        return false;
    }
}

// Usage
$result = deleteImageSafely($ds24, 'IMG12345');
```

## Important Notes

- **Deletion is permanent** - deleted images cannot be recovered
- Make sure the image is not currently used in:
  - Product listings
  - Order forms
  - Marketing materials
  - Active campaigns
- The image ID must be provided as an integer (without quotes)
- Any products or pages using the deleted image will show a broken image
- Consider backing up important images before deletion
- Deleting an image does not affect historical orders that used it

## Best Practices

1. **Audit First**: List images and identify unused ones before deletion
2. **Backup**: Save important images locally before deleting
3. **Check References**: Ensure no products or campaigns reference the image
4. **Batch Carefully**: When deleting multiple images, implement error handling
5. **Document**: Keep a record of deleted image IDs for reference

## Related Endpoints

- [Create Image](createImage.md) - Upload/create a new image
- [Get Image](getImage.md) - Get details of a specific image
- [List Images](listImages.md) - List all uploaded images
