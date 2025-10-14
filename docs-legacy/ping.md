```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$result = $api->monitoring->ping();

// object(GoSuccess\Digistore24\Models\Monitoring\Ping)#16 (1) {
//   ["server_time"]=>
//   object(DateTime)#15 (3) {
//     ["date"]=>
//     string(26) "2024-08-20 19:00:45.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
// }
```