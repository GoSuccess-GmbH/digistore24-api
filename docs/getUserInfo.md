```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$result = $api->user->get_info();

// object(GoSuccess\Digistore24\Models\User\Info)#16 (11) {
//   ["user_id"]=>
//   int(1029)
//   ["user_name"]=>
//   string(9) "GoSuccess"
//   ["granted_roles"]=>
//   array(2) {
//     [0]=>
//     enum(GoSuccess\Digistore24\Enumerations\Global\GrantedRole::Affiliate)
//     [1]=>
//     enum(GoSuccess\Digistore24\Enumerations\Global\GrantedRole::Merchant)
//   }
//   ["granted_roles_msg"]=>
//   array(2) {
//     [0]=>
//     string(9) "Affiliate"
//     [1]=>
//     string(6) "Vendor"
//   }
//   ["api_key_id"]=>
//   int(3376)
//   ["api_key_site_url"]=>
//   string(0) ""
//   ["api_key_permissions"]=>
//   string(8) "writable"
//   ["reseller_ids"]=>
//   array(1) {
//     [0]=>
//     enum(GoSuccess\Digistore24\Enumerations\Global\Reseller::DE)
//   }
//   ["thankyou_page_key"]=>
//   string(20) "8xUtaUJq5q7FeZE2zuKI"
//   ["modified_at"]=>
//   object(DateTime)#25 (3) {
//     ["date"]=>
//     string(26) "2024-08-21 17:14:20.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["contact"]=>
//   object(GoSuccess\Digistore24\Models\User\Contact)#29 (18) {
//     ["email"]=>
//     string(24) "contact@company.com"
//     ["first_name"]=>
//     string(4) "John"
//     ["last_name"]=>
//     string(6) "Doe"
//     ["title"]=>
//     string(0) ""
//     ["salutation"]=>
//     string(1) "M"
//     ["company"]=>
//     string(14) "Company Inc."
//     ["street"]=>
//     string(12) "Busy Street"
//     ["street_number"]=>
//     string(1) "1"
//     ["street2"]=>
//     string(0) ""
//     ["city"]=>
//     string(10) "Biz City"
//     ["state"]=>
//     string(0) ""
//     ["zipcode"]=>
//     string(5) "12345"
//     ["country"]=>
//     string(2) "DE"
//     ["phone_no"]=>
//     string(14) "+9912345678901"
//     ["tax_id"]=>
//     string(11) "DE123456789"
//     ["modified_at"]=>
//     object(DateTime)#30 (3) {
//       ["date"]=>
//       string(26) "2018-03-16 14:36:19.000000"
//       ["timezone_type"]=>
//       int(3)
//       ["timezone"]=>
//       string(3) "UTC"
//     }
//     ["support_email"]=>
//     string(20) "support@company.com"
//     ["skypename"]=>
//     string(0) ""
//   }
// }
```