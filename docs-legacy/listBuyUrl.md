```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$result = $api->buy_url->list();

// array(22) {
//   [0]=>
//   object(GoSuccess\Digistore24\Models\BuyUrl\BuyUrl)#15 (7) {
//     ["id"]=>
//     int(337214348)
//     ["created_at"]=>
//     object(DateTime)#40 (3) {
//       ["date"]=>
//       string(26) "2023-11-24 05:39:08.000000"
//       ["timezone_type"]=>
//       int(3)
//       ["timezone"]=>
//       string(3) "UTC"
//     }
//     ["valid_from"]=>
//     NULL
//     ["valid_until"]=>
//     NULL
//     ["product_id"]=>
//     int(11111)
//     ["url"]=>
//     string(62) "https://www.digistore24.com/offer/337214348/ByoBF5arytZK/11111"
//     ["email"]=>
//     string(26) "customer@email.com"
//   }
//   [1]=>
//   object(GoSuccess\Digistore24\Models\BuyUrl\BuyUrl)#41 (7) {
//     ["id"]=>
//     int(338838497)
//     ["created_at"]=>
//     object(DateTime)#42 (3) {
//       ["date"]=>
//       string(26) "2024-02-27 16:54:37.000000"
//       ["timezone_type"]=>
//       int(3)
//       ["timezone"]=>
//       string(3) "UTC"
//     }
//     ["valid_from"]=>
//     NULL
//     ["valid_until"]=>
//     object(DateTime)#83 (3) {
//       ["date"]=>
//       string(26) "2024-08-20 17:59:19.000000"
//       ["timezone_type"]=>
//       int(3)
//       ["timezone"]=>
//       string(3) "UTC"
//     }
//     ["product_id"]=>
//     int(22222)
//     ["url"]=>
//     string(62) "https://www.digistore24.com/offer/338838497/9SQa1qpGhyVc/22222"
//     ["email"]=>
//     string(0) ""
//   }
//   [2]=> ...
// }
```