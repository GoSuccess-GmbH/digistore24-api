# List Images

Returns a list of your Digistore24 images filtered by usage type.

## Endpoint

`GET /listImages`

## Description

Retrieves all images stored in your Digistore24 account, filtered by their usage type. This helps you manage and organize images based on their purpose (e.g., product images, logos, marketing materials).

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `usage_type` | string | Yes | Purpose of the images (e.g., 'product'). See `getGlobalSettings()` for available types. |

## Response

### Success Response (200 OK)

```json
{
  "images": [
    {
      "id": "05CZEP6G",
      "name": "Product Main Image",
      "url": "https://d3prvp0id2r5kj.cloudfront.net/merchant_1/image/product/05CZEP6G",
      "file_extension": "png",
      "approval_status": "approved",
      "usage_type": "product",
      "alt_tag": "Premium Product Photo",
      "width": 1200,
      "height": 800
    },
    {
      "id": "071VX0KZ",
      "name": "Product Gallery 1",
      "url": "https://d3prvp0id2r5kj.cloudfront.net/merchant_1/image/product/071VX0KZ",
      "file_extension": "jpg",
      "approval_status": "approved",
      "usage_type": "product",
      "alt_tag": null,
      "width": 800,
      "height": 600
    }
  ]
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `images` | array | List of image objects |
| `images[].id` | string | Image ID |
| `images[].name` | string | Image name |
| `images[].url` | string | CDN URL to access the image |
| `images[].file_extension` | string | File format (png, jpg, gif, etc.) |
| `images[].approval_status` | string | Approval status (e.g., "approved") |
| `images[].usage_type` | string | Purpose/category of the image |
| `images[].alt_tag` | string\|null | Alternative text for accessibility |
| `images[].width` | integer | Image width in pixels |
| `images[].height` | integer | Image height in pixels |

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Image\ListImagesRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// List all product images
$request = new ListImagesRequest(usageType: 'product');

try {
    $response = $ds24->images->list($request);
    
    echo "Found " . count($response->images) . " product images:\n\n";
    
    foreach ($response->images as $image) {
        echo "ID: {$image->id}\n";
        echo "Name: {$image->name}\n";
        echo "URL: {$image->url}\n";
        echo "Dimensions: {$image->width}x{$image->height}\n";
        echo "Format: {$image->fileExtension}\n";
        echo "---\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Find Images by Name

```php
// List and search for specific images by name
$request = new ListImagesRequest(usageType: 'product');
$response = $ds24->images->list($request);

$searchName = 'Premium';

$matchingImages = array_filter(
    $response->images,
    fn($image) => stripos($image->name, $searchName) !== false
);

echo "Images matching '{$searchName}':\n";
foreach ($matchingImages as $image) {
    echo "- {$image->name} (ID: {$image->id})\n";
}
```

## Example: Get Images Without Alt Tags

```php
// Find images that need alt tags for better accessibility
$request = new ListImagesRequest(usageType: 'product');
$response = $ds24->images->list($request);

$imagesWithoutAlt = array_filter(
    $response->images,
    fn($image) => empty($image->altTag)
);

if (count($imagesWithoutAlt) > 0) {
    echo "Images missing alt tags:\n";
    foreach ($imagesWithoutAlt as $image) {
        echo "- {$image->name} (ID: {$image->id}) - URL: {$image->url}\n";
    }
    echo "\nConsider adding alt tags for better accessibility and SEO.\n";
}
```

## Example: Display Image Gallery

```php
// Generate an HTML image gallery
$request = new ListImagesRequest(usageType: 'product');
$response = $ds24->images->list($request);

echo "<div class='image-gallery'>\n";
foreach ($response->images as $image) {
    $altText = htmlspecialchars($image->altTag ?? $image->name);
    echo "  <div class='image-item'>\n";
    echo "    <img src='{$image->url}' alt='{$altText}' width='{$image->width}' height='{$image->height}' />\n";
    echo "    <p>{$image->name}</p>\n";
    echo "  </div>\n";
}
echo "</div>\n";
```

## Important Notes

- The `usage_type` parameter is **required** - you must specify which type of images to retrieve
- Use `getGlobalSettings()` to get a list of available usage types for your account
- Common usage types include: 'product', 'logo', 'banner', 'marketing'
- All images are served via CDN for optimal performance
- Images are returned with their full metadata including dimensions
- The list includes all images regardless of approval status
- Use alt tags for better accessibility and SEO

## Usage Types

Common usage types (check `getGlobalSettings()` for your account's available types):

- **product** - Product images for listings
- **logo** - Company/brand logos
- **banner** - Marketing banners
- **marketing** - General marketing materials

## Related Endpoints

- [Create Image](createImage.md) - Upload/create a new image
- [Get Image](getImage.md) - Get details of a specific image
- [Delete Image](deleteImage.md) - Delete an image
