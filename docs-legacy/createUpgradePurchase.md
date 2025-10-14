```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$order_id = 'A1B2C3D4';
$upgrade_id = '9011-GKt6byIPcBh2';

/**
 * Other than mentioned in the Digstore24 developer documentation, the
 * the payment plan id is not optional!
 */
$payment_plan_id = 1;

$result = $api->purchase->upgrade( [$order_id], $upgrade_id, $payment_plan_id );

// object(GoSuccess\Digistore24\Models\Purchase\CreateUpgradePurchaseResponse)#16 (2) {
//   ["new_purchase"]=>
//   array(1) {
//     [0]=>
//     object(stdClass)#17 (7) {
//       ["id"]=>
//       string(8) "E5F6G7H8"
//       ["billing_status"]=>
//       string(6) "paying"
//       ["billing_mode"]=>
//       string(4) "auto"
//       ["paid_amount"]=>
//       int(0)
//       ["next_payment_at"]=>
//       string(10) "2024-09-21"
//       ["next_amount"]=>
//       string(5) "14.28"
//       ["currency"]=>
//       string(3) "EUR"
//     }
//   }
//   ["upgrade_info"]=>
//   array(1) {
//     [0]=>
//     object(stdClass)#19 (4) {
//       ["upgrade_type"]=>
//       string(7) "upgrade"
//       ["upgrade_amount_left"]=>
//       string(5) "13.47"
//       ["upgrade_amount_total"]=>
//       string(5) "27.75"
//       ["upgraded_purchase_id"]=>
//       string(8) "A1B2C3D4"
//     }
//   }
// }
```