```php
<?php

use GoSuccess\Digistore24\API;
use GoSuccess\Digistore24\Models\Billing\CreateBillingOnDemandRequest;
use GoSuccess\Digistore24\Models\Billing\Paymentplan;
use GoSuccess\Digistore24\Models\Billing\Tracking;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

/**
 * Reference order id. This order must have been made with a payment method that supports rebilling.
 */
$order_id = 'A1B2C3D4';

/**
 * Product ID you want to create a billing for.
 */
$product_id = 12345;

/**
 * Only these two properties (order_id, product_id) are mandatory.
 * The others are optional.
 */
$billing_on_demand = new CreateBillingOnDemandRequest();
$billing_on_demand->purchase_id = $order_id;
$billing_on_demand->product_id = $product_id;

$payment_plan = new Paymentplan();
$payment_plan->first_amount = 9.99;
$billing_on_demand->payment_plan = $payment_plan;

$tracking = new Tracking();
$tracking->custom = 'Testing';
$tracking->affiliate = 'GoSuccess';
$billing_on_demand->tracking = $tracking;

/**
 * These are my individual placeholders. You need to use your own if you use any.
 */
$billing_on_demand->placeholders['servicename'] = 'Software Development';
$billing_on_demand->placeholders['description'] = 'Research, Development, Debugging';

$result = $api->billing_on_demand->create( $billing_on_demand );

if( $result === null )
{
    foreach( $api->get_errors() as $error )
    {
        echo $error . "\n";
    };
}
else
{
    var_dump( $result );

// object(GoSuccess\Digistore24\Models\Billing\CreateBillingOnDemandResponse)#19 (10) {
//   ["created_purchase_id"]=>
//   string(11) "A1B2C3D4001"
//   ["payment_status"]=>
//   string(9) "completed"
//   ["payment_status_msg"]=>
//   string(12) "Vollständig"
//   ["billing_status"]=>
//   string(9) "completed"
//   ["billing_status_msg"]=>
//   string(20) "Vollständig bezahlt"
//   ["currency"]=>
//   string(3) "EUR"
//   ["paid_amount"]=>
//   float(11.89)
//   ["open_amount"]=>
//   float(0)
//   ["parent_purchase_id"]=>
//   string(8) "A1B2C3D4"
//   ["pay_url"]=>
//   string(0) ""
// }
}
```