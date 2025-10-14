```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$result = $api->rebilling->list_status_changes();

// object(GoSuccess\Digistore24\Models\Rebilling\RebillingStatusChangeResponse)#34 (7) {
//   ["from"]=>
//   object(DateTime)#33 (3) {
//     ["date"]=>
//     string(26) "2024-12-22 17:54:21.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["to"]=>
//   object(DateTime)#42 (3) {
//     ["date"]=>
//     string(26) "2024-12-23 17:54:21.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["items"]=>
//   array(2) {
//     [0]=>
//     object(GoSuccess\Digistore24\Models\Rebilling\RebillingStatusChange)#63 (6) {
//       ["id"]=>
//       int(89371211)
//       ["purchase_id"]=>
//       string(8) "EA7H12QR"
//       ["created_at"]=>
//       object(DateTime)#68 (3) {
//         ["date"]=>
//         string(26) "2024-12-23 09:36:03.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//       }
//       ["pay_sequence_no"]=>
//       int(1)
//       ["type"]=>
//       enum(GoSuccess\Digistore24\Enumerations\IPN\TransactionType::RebillCancelled)
//       ["type_msg"]=>
//       string(41) "Subscription/installment payment canceled"
//     }
//     [1]=>
//     object(GoSuccess\Digistore24\Models\Rebilling\RebillingStatusChange)#65 (6) {
//       ["id"]=>
//       int(89380626)
//       ["purchase_id"]=>
//       string(8) "EA7H12QR"
//       ["created_at"]=>
//       object(DateTime)#70 (3) {
//         ["date"]=>
//         string(26) "2024-12-23 17:32:25.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//       }
//       ["pay_sequence_no"]=>
//       int(1)
//       ["type"]=>
//       enum(GoSuccess\Digistore24\Enumerations\IPN\TransactionType::RebillResumed)
//       ["type_msg"]=>
//       string(40) "Subscription/installment payment resumed"
//     }
//   }
//   ["page_size"]=>
//   int(100)
//   ["page_no"]=>
//   int(1)
//   ["page_count"]=>
//   int(1)
//   ["item_count"]=>
//   int(6)
// }
```