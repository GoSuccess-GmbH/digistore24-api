```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$order_id = 'A1B2C3D4';
$balance_to_add = 99.9;

$result = $api->purchase->add_balance( $order_id, $balance_to_add );

// object(GoSuccess\Digistore24\Models\Purchase\Balance)#16 (2) {
//   ["old_balance"]=>
//   float(0)
//   ["new_balance"]=>
//   float(99.9)
// }
```