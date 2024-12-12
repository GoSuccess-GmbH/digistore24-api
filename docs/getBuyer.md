```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Models\Affiliate\CommissionUpdateRequest;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$buyer_id = 123456789;

// Get buyer details
$result = $api->buyer->get( $buyer_id );

// object(GoSuccess\Digistore24\Models\Buyer\Buyer)#16 (20) {
//   ["salutation_msg"]=>
//   string(0) ""
//   ["street"]=>
//   string(12) "Best Street 1"
//   ["buyer_type"]=>
//   string(8) "business"
//   ["id"]=>
//   int(123456789)
//   ["address_id"]=>
//   int(987654321)
//   ["street_name"]=>
//   string(11) "Best Street"
//   ["created_at"]=>
//   object(DateTime)#15 (3) {
//     ["date"]=>
//     string(26) "2024-06-19 05:28:46.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["email"]=>
//   string(14) "best@vendor.com"
//   ["first_name"]=>
//   string(4) "John"
//   ["last_name"]=>
//   string(3) "Doe"
//   ["salutation"]=>
//   string(0) ""
//   ["title"]=>
//   string(0) ""
//   ["company"]=>
//   string(15) "Enterprise Inc."
//   ["street_number"]=>
//   string(1) "1"
//   ["street2"]=>
//   string(0) ""
//   ["zipcode"]=>
//   string(5) "12345"
//   ["city"]=>
//   string(8) "Big City"
//   ["state"]=>
//   string(0) ""
//   ["country"]=>
//   string(2) "DE"
//   ["phone_no"]=>
//   string(0) ""
// }
```
