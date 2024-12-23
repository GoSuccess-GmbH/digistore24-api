```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$order_id = 'A1B2C3D4';

$result = $api->rebilling->create_rebilling( $order_id );

// object(GoSuccess\Digistore24\Models\Rebilling\CreateRebillingPaymentResponse)#34 (6) {
//   ["purchase_id"]=>
//   string(8) "EA7H12QR"
//   ["payment_status"]=>
//   enum(GoSuccess\Digistore24\Enumerations\Billing\PaymentStatus::Error)
//   ["payment_message"]=>
//   string(70) "Payments of this purchase are processed automatically by the platform."
//   ["billing_status"]=>
//   NULL
//   ["payment_data_update_required"]=>
//   bool(false)
//   ["payment_data_update_url"]=>
//   string(51) "https://www.checkout-ds24.com/pay/EA7H12QR/Y3ZLVEW2"
// }
```