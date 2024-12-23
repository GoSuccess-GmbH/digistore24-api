```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$order_id = 'A1B2C3D4';

$result = $api->rebilling->stop( $order_id );

// object(GoSuccess\Digistore24\Models\Rebilling\StopRebillingResponse)#34 (10) {
//   ["modified"]=>
//   bool(true)
//   ["note"]=>
//   string(0) ""
//   ["code"]=>
//   enum(GoSuccess\Digistore24\Enumerations\Billing\RebillingCode::StoppedNow)
//   ["billing_status"]=>
//   enum(GoSuccess\Digistore24\Enumerations\Billing\RebillingStatus::Aborted)
//   ["billing_status_msg"]=>
//   string(17) "Payments canceled"
//   ["next_payment_at"]=>
//   object(DateTime)#42 (3) {
//     ["date"]=>
//     string(26) "2024-12-22 00:00:00.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["rebilling_active"]=>
//   bool(false)
//   ["is_cancelled_now"]=>
//   bool(false)
//   ["is_cancelled_later"]=>
//   bool(false)
//   ["can_cancel_before"]=>
//   NULL
// }
```