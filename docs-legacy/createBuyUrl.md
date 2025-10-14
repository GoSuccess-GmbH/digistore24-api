```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Models\BuyUrl\CreateBuyUrlRequest;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$product_id = 12345;

/**
 * Only product_id is mandatory.
 */
$create_buy_url_request = new CreateBuyUrlRequest();
$create_buy_url_request->product_id = $product_id;
$create_buy_url_request->valid_until = '+10m'; // 10 minutes valid from now

$result = $api->buy_url->create( $create_buy_url_request );

// object(GoSuccess\Digistore24\Models\BuyUrl\CreateBuyUrlResponse)#17 (6) {
//   ["id"]=>
//   int(342033068)
//   ["url"]=>
//   string(62) "https://www.digistore24.com/offer/342033068/vzJd5b3qByzt/12345"
//   ["valid_until"]=>
//   object(DateTime)#16 (3) {
//     ["date"]=>
//     string(26) "2024-08-20 17:59:19.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["upgrade_status"]=>
//   string(4) "none"
//   ["upgrade_type"]=>
//   string(4) "none"
//   ["upgrade_errors"]=>
//   NULL
// }

if( $result === null )
{
    foreach( $api->get_errors() as $error )
    {
        echo $error . "\n";
    };
}
else
{
    echo 'Buy URL: ' . $result->url;
}
```