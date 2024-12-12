```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$domain_id = 'my.membership.site';

$result = $api->ipn->delete( $domain_id );

// object(GoSuccess\Digistore24\Models\IPN\DeleteResponse)#16 (2) {
//   ["modified"]=>
//   bool(true)
//   ["domain_id"]=>
//   string(18) "my.membership.site"
// }
```