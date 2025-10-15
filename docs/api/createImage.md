# Create Image

Creates an image on Digistore24 by providing a URL from which to copy the image.

## Endpoint

`POST /createImage`

## Description

This endpoint allows you to upload images to Digistore24 by providing a publicly accessible URL. Digistore24 will download and store the image on their servers.

## Use Cases

- Upload product images for your products
- Add images for marketing materials
- Store branding assets on Digistore24
- Manage images for order forms and product descriptions

## Request Parameters

The request takes a `data` object with the following properties:

| Parameter | Type | Required | Max Length | Description |
|-----------|------|----------|------------|-------------|
| `name` | string | Yes | 63 | Name of the image |
| `image-url` | string | Yes | - | URL from which Digistore24 copies the image (must be publicly accessible) |
| `usage_type` | string | No | - | Purpose of the image (e.g., 'product'). See `getGlobalSettings()` for available types. |
| `alt_tag` | string | No | - | Alternative text for the image (for accessibility) |

## Response

### Success Response (200 OK)

```json
{
  "result": "success",
  "data": {
    "image_id": "IMG12345",
    "image_url": "https://www.digistore24.com/images/IMG12345.jpg"
  }
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `image_id` | string | ID of the created image on Digistore24 |
| `image_url` | string | URL of the created image on Digistore24 servers |

### Error Responses

#### 400 Bad Request
Invalid request parameters (e.g., name too long, invalid URL format).

#### 403 Forbidden
Access denied - Full access required.

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Image\CreateImageRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Create an image
$request = new CreateImageRequest(
    name: 'Product Image 1',
    imageUrl: 'https://example.com/images/product.jpg',
    usageType: 'product',
    altTag: 'Premium Product Photo'
);

try {
    $response = $ds24->images->create($request);
    
    echo "Image created successfully!\n";
    echo "Image ID: {$response->imageId}\n";
    echo "Image URL: {$response->imageUrl}\n";
    
    // You can now use this image_id in product creation or updates
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example with Product Images

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Image\CreateImageRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Upload multiple product images
$imageUrls = [
    'https://example.com/product-front.jpg',
    'https://example.com/product-side.jpg',
    'https://example.com/product-back.jpg',
];

$uploadedImages = [];

foreach ($imageUrls as $index => $url) {
    $request = new CreateImageRequest(
        name: "Product Image " . ($index + 1),
        imageUrl: $url,
        usageType: 'product',
        altTag: "Product view " . ($index + 1)
    );
    
    try {
        $response = $ds24->images->create($request);
        $uploadedImages[] = [
            'id' => $response->imageId,
            'url' => $response->imageUrl,
        ];
        echo "Uploaded: {$response->imageId}\n";
    } catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
        echo "Failed to upload {$url}: {$e->getMessage()}\n";
    }
}

// Use $uploadedImages in product creation
print_r($uploadedImages);
```

## Important Notes

- **Image name is limited to 63 characters**
- The source URL must be **publicly accessible** (no authentication required)
- Digistore24 downloads and stores a copy of the image
- Supported image formats depend on Digistore24's platform (typically JPG, PNG, GIF)
- The `usage_type` helps categorize images in your account
- Use descriptive `alt_tag` values for accessibility and SEO
- The returned `image_id` can be used in other API calls (e.g., product creation)

## Related Endpoints

- [Get Image](getImage.md) - Retrieve image details
- [List Images](listImages.md) - List all uploaded images
- [Delete Image](deleteImage.md) - Delete an image
- [Get Global Settings](getGlobalSettings.md) - Get available usage types
