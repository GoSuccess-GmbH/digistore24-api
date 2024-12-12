```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Models\Product\Product;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

/**
 * ID of the product to be copied.
 */
$product_id = 12345;

/** 
 * Product properties to change (optional).
 * I changed here only two properties to demonstrate, but you can change all available properties or none.
 */
$product = new Product();
$product->name = 'My phenomenal product';
$product->is_active = false;

// Copy and get the ID of the new product.
$result = $api->product->copy( $product_id, $product );

// object(GoSuccess\Digistore24\Models\Product\CopyProductResponse)#17 (1) {
//   ["product_id"]=>
//   int(566256)
// }
```