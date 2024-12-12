```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Models\BuyUrl\CreateBuyUrlRequest;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$buy_url_id = 342033068;

$result = $api->buy_url->delete( $buy_url_id );

// object(GoSuccess\Digistore24\Models\BuyUrl\DeleteBuyUrlResponse)#16 (1) {
//   ["modified"]=>
//   bool(true)
// }
```