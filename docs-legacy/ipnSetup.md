```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Enumerations\IPN\NewsletterSendPolicy;
use GoSuccess\Digistore24\Enumerations\IPN\Timing;
use GoSuccess\Digistore24\Enumerations\IPN\TransactionCategory;
use GoSuccess\Digistore24\Enumerations\IPN\TransactionType;
use GoSuccess\Digistore24\Models\IPN\Settings;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$ipn_setup = new Settings();
$ipn_setup->ipn_url = 'https://webhook.site/399d62c0-a43f-41e5-8597-77afdc67ca13';
$ipn_setup->name = 'DEV TEST';
$ipn_setup->product_ids = ['all'];
$ipn_setup->domain_id = 'my.membership.site';
$ipn_setup->categories = [TransactionCategory::Orders];
$ipn_setup->transactions = [TransactionType::PaymentDenial];
$ipn_setup->timing = Timing::BeforeThankYou;
$ipn_setup->newsletter_send_policy = NewsletterSendPolicy::SendIfOptin;

$result = $api->ipn->create($ipn_setup);

// object(GoSuccess\Digistore24\Models\IPN\SetupResponse)#37 (7) {
//   ["created"]=>
//   bool(true)
//   ["updated"]=>
//   bool(false)
//   ["deleted"]=>
//   bool(false)
//   ["domain_id"]=>
//   string(18) "my.membership.site"
//   ["sha_passphrase"]=>
//   NULL
//   ["ipn_config_id"]=>
//   int(245483)
//   ["ipn_id"]=>
//   int(245483)
// }
```