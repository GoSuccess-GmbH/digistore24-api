```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$affiliate_id = 'BestAffiliate';
$product_id = 12345;

// Get all Commissions
$result = $api->affiliate->get_commission( $affiliate );

// object(GoSuccess\Digistore24\Models\Affiliate\Commission)#16 (3) {
//   ["affiliations"]=>
//   array(20) {
//     [0]=>
//     object(GoSuccess\Digistore24\Models\Affiliate\Affiliation)#80 (11) {
//       ["commission_rate"]=>
//       float(10)
//       ["commission_currency"]=>
//       string(3) "EUR"
//       ["default_commission_rate"]=>
//       float(10)
//       ["default_commission_fix"]=>
//       float(0)
//       ["default_commission_currency"]=>
//       string(3) "EUR"
//       ["commission_fix"]=>
//       float(0)
//       ["is_on_first_pmnt_only"]=>
//       string(0) ""
//       ["product_id"]=>
//       int(14137)
//       ["product_is_active"]=>
//       bool(false)
//       ["approval_status"]=>
//       enum(GoSuccess\Digistore24\Enumerations\Affiliate\ApprovalStatus::Approved)
//       ["approval_status_msg"]=>
//       string(9) "Genehmigt"
//     }
//     [1]=>
//     object(GoSuccess\Digistore24\Models\Affiliate\Affiliation)#81 (11) {
//       ["commission_rate"]=>
//       float(0)
//       ["commission_currency"]=>
//       string(3) "EUR"
//       ["default_commission_rate"]=>
//       float(0)
//       ["default_commission_fix"]=>
//       float(0)
//       ["default_commission_currency"]=>
//       string(3) "EUR"
//       ["commission_fix"]=>
//       float(0)
//       ["is_on_first_pmnt_only"]=>
//       string(0) ""
//       ["product_id"]=>
//       int(43383)
//       ["product_is_active"]=>
//       bool(true)
//       ["approval_status"]=>
//       enum(GoSuccess\Digistore24\Enumerations\Affiliate\ApprovalStatus::Pending)
//       ["approval_status_msg"]=>
//       string(9) "Warte ..."
//     }
//   }
//   ["affiliate_id"]=>
//   int(123)
//   ["affiliate_name"]=>
//   string(9) "BestAffiliate"
// }

// Get Commission for specific product(s)
// Put all product ids into the array for which you need the commission.
$result = $api->affiliate->get_commission( $affiliate, [$product_id] );

// object(GoSuccess\Digistore24\Models\Affiliate\Commission)#16 (3) {
//   ["affiliations"]=>
//   array(1) {
//     [0]=>
//     object(GoSuccess\Digistore24\Models\Affiliate\Affiliation)#15 (11) {
//       ["commission_rate"]=>
//       float(0)
//       ["commission_currency"]=>
//       string(3) "EUR"
//       ["default_commission_rate"]=>
//       float(0)
//       ["default_commission_fix"]=>
//       float(0)
//       ["default_commission_currency"]=>
//       string(3) "EUR"
//       ["commission_fix"]=>
//       float(0)
//       ["is_on_first_pmnt_only"]=>
//       string(0) ""
//       ["product_id"]=>
//       int(43383)
//       ["product_is_active"]=>
//       bool(true)
//       ["approval_status"]=>
//       enum(GoSuccess\Digistore24\Enumerations\Affiliate\ApprovalStatus::Pending)
//       ["approval_status_msg"]=>
//       string(9) "Warte ..."
//     }
//   }
//   ["affiliate_id"]=>
//   int(123)
//   ["affiliate_name"]=>
//   string(9) "BestAffiliate"
// }
```
