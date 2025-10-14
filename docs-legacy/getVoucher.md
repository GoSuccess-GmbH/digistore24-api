```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$voucher_code = 'BestDeal';

$result = $api->voucher->get( $voucher_code );

// object(GoSuccess\Digistore24\Models\Voucher\Coupon)#16 (17) {
//   ["affiliate_name"]=>
//   string(0) ""
//   ["first_rate"]=>
//   float(90)
//   ["other_rates"]=>
//   float(0)
//   ["id"]=>
//   int(827736)
//   ["code"]=>
//   string(8) "BestDeal"
//   ["valid_from"]=>
//   NULL
//   ["expires_at"]=>
//   NULL
//   ["product_ids"]=>
//   string(6) "677358"
//   ["first_amount"]=>
//   float(0)
//   ["other_amounts"]=>
//   float(0)
//   ["upgrade_policy"]=>
//   string(5) "valid"
//   ["is_count_limited"]=>
//   bool(false)
//   ["count_left"]=>
//   int(1)
//   ["currency"]=>
//   string(3) "EUR"
//   ["is_active"]=>
//   bool(false)
//   ["note"]=>
//   string(0) ""
//   ["affiliate_id"]=>
//   NULL
// }
```