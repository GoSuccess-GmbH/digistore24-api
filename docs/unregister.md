```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$result = $api->api_setup->delete();

// object(GoSuccess\Digistore24\Models\API\DeleteApiKeyResponse)#46 (2) {
//   ["modified"]=>
//   bool(true)
//   ["note"]=>
//   string(29) "The API key has been deleted."
// }
```