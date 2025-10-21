# Get Product

Returns detailed information about a specific Digistore24 product.

## Endpoint

`GET /getProduct`

## Description

Retrieves complete details of a product including name, pricing, settings, and metadata. Use this to fetch product information for display, validation, or synchronization purposes.

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `product_id` | integer | Yes | Numeric ID of the product to retrieve |

## Response

### Success Response (200 OK)

```json
{
  "product": {
    "id": 39,
    "name": "The Weight Loss Cake",
    "note": "Premium product",
    "tag": "health",
    "language": "de",
    "product_group_id": 17,
    "product_group_name": "My happiness products",
    "units_left": "infinite",
    "created_at": "2012-06-07 00:45:36",
    "modified_at": "2013-09-16 21:45:10"
  }
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `product` | object | Product data record with all properties |
| `product.id` | integer | Product ID |
| `product.name` | string | Product name |
| `product.note` | string\|null | Optional product note/description |
| `product.tag` | string\|null | Product tag for categorization |
| `product.language` | string | Language code (e.g., "de", "en") |
| `product.product_group_id` | integer\|null | ID of the product group/folder |
| `product.product_group_name` | string\|null | Name of the product group |
| `product.units_left` | string | Available units ("infinite" or number) |
| `product.created_at` | string | Creation timestamp |
| `product.modified_at` | string | Last modification timestamp |

### Error Responses

#### 401 Unauthorized
Invalid or missing API key.

#### 403 Forbidden
Insufficient access rights.

#### 404 Not Found
Product with specified ID does not exist.

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\Product\GetProductRequest;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Get product details
$request = new GetProductRequest(productId: '39');

try {
    $response = $ds24->products->get($request);
    
    echo "Product: {$response->productName}\n";
    echo "ID: {$response->productId}\n";
    echo "Language: {$response->language}\n";
    echo "Units Left: {$response->unitsLeft}\n";
    
    if ($response->productGroupName) {
        echo "Group: {$response->productGroupName}\n";
    }
    
    if ($response->description) {
        echo "Description: {$response->description}\n";
    }
} catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
    echo "Product not found\n";
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Important Notes

- Product ID must be numeric
- Returns complete product data including internal fields
- Use for product validation before creating buy URLs or orders
- Product availability is indicated by `units_left` field

## Related Endpoints

- [List Products](listProducts.md) - List all products
- [Create Buy URL](createBuyUrl.md) - Create customized order URL for a product
