```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$domain_id = 'my.membership.site';

$result = $api->ipn->get( $domain_id );

// object(GoSuccess\Digistore24\Models\IPN\IPN)#16 (2) {
//   ["have_settings"]=>
//   bool(true)
//   ["ipn_settings"]=>
//   object(GoSuccess\Digistore24\Models\IPN\Settings)#15 (9) {
//     ["newsletter_send_policy"]=>
//     enum(GoSuccess\Digistore24\Enumerations\IPN\NewsletterSendPolicy::SendIfOptin)
//     ["name"]=>
//     string(8) "DEV TEST"
//     ["domain_id"]=>
//     string(18) "my.membership.site"
//     ["product_ids"]=>
//     array(1) {
//       [0]=>
//       string(3) "all"
//     }
//     ["ipn_url"]=>
//     string(57) "https://webhook.site/399d62c0-a43f-41e5-8597-77afdc67ca13"
//     ["categories"]=>
//     NULL
//     ["transactions"]=>
//     array(1) {
//       [0]=>
//       string(14) "payment_denial"
//     }
//     ["timing"]=>
//     enum(GoSuccess\Digistore24\Enumerations\IPN\Timing::BeforeThankYou)
//     ["sha_passphrase"]=>
//     string(0) ""
//   }
// }
```