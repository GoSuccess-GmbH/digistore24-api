```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Models\Product\Product;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$product = new Product();
$product->name = 'My phenomenal product';

$result = $api->product->create( $product );

// object(GoSuccess\Digistore24\Models\Product\CreateProductResponse)#17 (1) {
//   ["product_id"]=>
//   array(1) {
//     [0]=>
//     int(566249)
//   }
// }
```