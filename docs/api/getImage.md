# Get Image

Returns detailed information about a specific image.

## Endpoint

`GET /getImage`

## Description

Retrieves properties and metadata for an image stored on Digistore24. Use this to get details about images you've uploaded, including their URLs, types, and properties.

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `image_id` | string | Yes | Alphanumeric ID of the image |

## Response

### Success Response (200 OK)

```json
{
  "image": {
    "id": "IMG12345",
    "url": "https://d3prvp0id2r5kj.cloudfront.net/merchant_1/image/product/IMG12345",
    "type": "product",
    "properties": {
      "width": 800,
      "height": 600,
      "file_extension": "jpg",
      "alt_tag": "Product Image"
    }
  }
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `image` | object | Image data object |
| `image.id` | string | Image ID |
| `image.url` | string | URL to access the image |
| `image.type` | string | Type/purpose of image |
| `image.properties` | object | Additional image properties (dimensions, format, etc.) |

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
use GoSuccess\Digistore24\Api\Request\Image\GetImageRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Get image details
$request = new GetImageRequest(imageId: 'IMG12345');

try {
    $response = $ds24->images->get($request);
    
    echo "Image ID: {$response->imageId}\n";
    echo "Image URL: {$response->imageUrl}\n";
    echo "Type: {$response->type}\n";
    
    if ($response->properties) {
        echo "Additional properties:\n";
        print_r($response->properties);
    }
} catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
    echo "Image not found: {$e->getMessage()}\n";
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Verify Image Before Using

```php
// Check if an image exists and is accessible before using it
$imageId = 'IMG12345';
$request = new GetImageRequest(imageId: $imageId);

try {
    $response = $ds24->images->get($request);
    
    // Image exists and is accessible
    echo "Using image: {$response->imageUrl}\n";
    
    // You can now safely use this image ID in product creation, etc.
    
} catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
    echo "Image {$imageId} not found. Please upload it first.\n";
}
```

## Important Notes

- The image ID is case-sensitive
- The returned URL is the CDN URL for optimal performance
- Properties may vary depending on the image type and format
- Use this endpoint to verify images exist before referencing them in products
- Image URLs are permanent and can be cached

## Related Endpoints

- [Create Image](createImage.md) - Upload/create a new image
- [List Images](listImages.md) - List all uploaded images
- [Delete Image](deleteImage.md) - Delete an image
