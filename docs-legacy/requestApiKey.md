```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Enumerations\API\Permission;
use GoSuccess\Digistore24\Models\API\RequestApiKeyRequest;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_DEVELOPER_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_DEVELOPER_API_KEY );

$new_api = new RequestApiKeyRequest();
$new_api->permissions = Permission::Writable;
$new_api->return_url = 'https://my.domain.tld/returning-from-ds24?token=__TOKEN__';
$new_api->cancel_url = 'https://my.domain.tld/canceled-ds24-request';
$new_api->comment  = 'API for my Client Area.';

$result = $api->api_setup->request($new_api);

// object(GoSuccess\Digistore24\Models\API\RequestApiKeyResponse)#35 (2) {
//   ["request_url"]=>
//   string(125) "https://www.digistore24.com/extern/api_register/auth/12345-xxxxxxx/2657381-WJlLIM7KGDs2eoV"
//   ["request_token"]=>
//   string(23) "2657381-qGXaZbg726RWmB1"
// }
```