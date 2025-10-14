```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Models\API\RetrieveApiKeyRequest;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_DEVELOPER_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_DEVELOPER_API_KEY );

$new_api = new RetrieveApiKeyRequest();
$new_api->token = '2657381-qGXaZbg726RWmB1';

$result = $api_dev->api_setup->retrieve($new_api);

// object(GoSuccess\Digistore24\Models\API\RetrieveApiKeyResponse)#33 (2) {
//   ["api_key"]=>
//   string(48) "1314297-SGriI2CJ4sGazFAuY1uil8bl7TB8GXjzmFKZ5gwS"
//   ["request_status"]=>
//   enum(GoSuccess\Digistore24\Enumerations\API\RequestStatus::Completed)
//   ["note"]=>
//   NULL
// }
```