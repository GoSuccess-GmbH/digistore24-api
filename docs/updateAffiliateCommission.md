```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Models\Affiliate\CommissionUpdateRequest;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$affiliate_id = 'BestAffiliate';
$product_id = 12345;

// Get all Commissions
$commission_update_request = new CommissionUpdateRequest();
$commission_update_request->affiliate_id = $affiliate_id;
$commission_update_request->product_ids = [$product_id];
$commission_update_request->commission_rate = 33;

$result = $api->affiliate->update_commission( $commission_update_request );

// object(GoSuccess\Digistore24\Models\Affiliate\CommissionUpdateResponse)#17 (6) {
//   ["modified"]=>
//   bool(true)
//   ["affiliate_id"]=>
//   int(123)
//   ["not_create_reasons"]=>
//   NULL
//   ["created_product_ids"]=>
//   NULL
//   ["modified_product_ids"]=>
//   array(1) {
//     [0]=>
//     int(12345)
//   }
//   ["unmodified_product_ids"]=>
//   NULL
// }
```
