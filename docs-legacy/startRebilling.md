```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$order_id = 'A1B2C3D4';

$result = $api->rebilling->start( $order_id );

// object(GoSuccess\Digistore24\Models\Rebilling\StartRebillingResponse)#34 (6) {
//   ["modified"]=>
//   bool(true)
//   ["note"]=>
//   string(27) "Payments have been resumed."
//   ["billing_status"]=>
//   enum(GoSuccess\Digistore24\Enumerations\Billing\RebillingStatus::Paying)
//   ["billing_status_msg"]=>
//   string(15) "Payments active"
//   ["next_payment_at"]=>
//   object(DateTime)#39 (3) {
//     ["date"]=>
//     string(26) "2024-12-22 00:00:00.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["rebilling_active"]=>
//   bool(true)
// }
```