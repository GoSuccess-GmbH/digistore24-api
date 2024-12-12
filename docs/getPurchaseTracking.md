```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$order_id = 'A1B2C3D4';

$result = $api->purchase->get_tracking( $order_id );

// object(GoSuccess\Digistore24\Models\Purchase\Tracking)#16 (5) {
//   ["utm_params"]=>
//   object(GoSuccess\Digistore24\Models\Purchase\TrackingUtmParams)#15 (5) {
//     ["utm_source"]=>
//     string(0) ""
//     ["utm_medium"]=>
//     string(0) ""
//     ["utm_campaign"]=>
//     string(0) ""
//     ["utm_term"]=>
//     string(0) ""
//     ["utm_content"]=>
//     string(0) ""
//   }
//   ["click_id"]=>
//   string(0) ""
//   ["sub_ids"]=>
//   NULL
//   ["vendor_key"]=>
//   string(17) "email-sale"
//   ["campaign_key"]=>
//   string(0) ""
// }
```