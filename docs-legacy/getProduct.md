```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

$product_id = 12345;

$result = $api->product->get( $product_id );

// object(GoSuccess\Digistore24\Models\Product\Product)#16 (112) {
//   ["name"]=>
//   string(21) "My phenomenal product"
//   ["name_de"]=>
//   string(21) "My phenomenal product"
//   ["name_en"]=>
//   string(21) "My phenomenal product"
//   ["name_fr"]=>
//   string(21) "My phenomenal product"
//   ["name_es"]=>
//   string(21) "My phenomenal product"
//   ["name_nl"]=>
//   string(21) "My phenomenal product"
//   ["name_it"]=>
//   string(21) "My phenomenal product"
//   ["name_pt"]=>
//   string(21) "My phenomenal product"
//   ["name_pl"]=>
//   string(21) "My phenomenal product"
//   ["name_sl"]=>
//   string(21) "My phenomenal product"
//   ["description"]=>
//   string(0) ""
//   ["description_de"]=>
//   string(0) ""
//   ["description_en"]=>
//   string(0) ""
//   ["description_fr"]=>
//   string(0) ""
//   ["description_es"]=>
//   string(0) ""
//   ["description_nl"]=>
//   string(0) ""
//   ["description_it"]=>
//   string(0) ""
//   ["description_pt"]=>
//   string(0) ""
//   ["description_pl"]=>
//   string(0) ""
//   ["description_sl"]=>
//   string(0) ""
//   ["description_thankyou_page"]=>
//   string(0) ""
//   ["description_thankyou_page_de"]=>
//   string(0) ""
//   ["description_thankyou_page_en"]=>
//   string(0) ""
//   ["description_thankyou_page_fr"]=>
//   string(0) ""
//   ["description_thankyou_page_es"]=>
//   string(0) ""
//   ["description_thankyou_page_nl"]=>
//   string(0) ""
//   ["description_thankyou_page_it"]=>
//   string(0) ""
//   ["description_thankyou_page_pt"]=>
//   string(0) ""
//   ["description_thankyou_page_pl"]=>
//   string(0) ""
//   ["description_thankyou_page_sl"]=>
//   string(0) ""
//   ["optin_text"]=>
//   string(59) "Hiermit bestelle ich widerruflich Ihren E-Mail-Newsletter. "
//   ["optin_text_de"]=>
//   string(59) "Hiermit bestelle ich widerruflich Ihren E-Mail-Newsletter. "
//   ["optin_text_en"]=>
//   string(48) "I hereby revocably order your email newsletter. "
//   ["optin_text_fr"]=>
//   string(87) "Par la présente, je m’abonne à titre révocable à votre newsletter électronique. "
//   ["optin_text_es"]=>
//   string(89) "Por la presente pido de forma revocable su boletín informativo por correo electrónico. "
//   ["optin_text_nl"]=>
//   string(48) "I hereby revocably order your email newsletter. "
//   ["optin_text_it"]=>
//   string(48) "I hereby revocably order your email newsletter. "
//   ["optin_text_pt"]=>
//   string(55) "Solicito irrevogavelmente a sua newsletter por e-mail. "
//   ["optin_text_pl"]=>
//   string(48) "I hereby revocably order your email newsletter. "
//   ["optin_text_sl"]=>
//   string(48) "I hereby revocably order your email newsletter. "
//   ["approval_status_list"]=>
//   array(4) {
//     [0]=>
//     object(stdClass)#18 (9) {
//       ["reseller_id"]=>
//       string(1) "1"
//       ["reseller_name"]=>
//       string(5) "DS-de"
//       ["approval_status"]=>
//       string(3) "new"
//       ["approval_status_msg"]=>
//       string(3) "Neu"
//       ["is_siteowner_active"]=>
//       string(1) "Y"
//       ["modified_at"]=>
//       NULL
//       ["approval_reject_reason"]=>
//       array(0) {
//       }
//       ["approval_reject_reason_msg"]=>
//       string(0) ""
//       ["approval_reject_reason_description"]=>
//       string(0) ""
//     }
//     [1]=>
//     object(stdClass)#19 (9) {
//       ["reseller_id"]=>
//       string(1) "2"
//       ["reseller_name"]=>
//       string(5) "DS-us"
//       ["approval_status"]=>
//       string(3) "new"
//       ["approval_status_msg"]=>
//       string(3) "Neu"
//       ["is_siteowner_active"]=>
//       string(1) "N"
//       ["modified_at"]=>
//       NULL
//       ["approval_reject_reason"]=>
//       array(0) {
//       }
//       ["approval_reject_reason_msg"]=>
//       string(0) ""
//       ["approval_reject_reason_description"]=>
//       string(0) ""
//     }
//     [2]=>
//     object(stdClass)#20 (9) {
//       ["reseller_id"]=>
//       string(1) "3"
//       ["reseller_name"]=>
//       string(5) "DS-uk"
//       ["approval_status"]=>
//       string(3) "new"
//       ["approval_status_msg"]=>
//       string(3) "Neu"
//       ["is_siteowner_active"]=>
//       string(1) "N"
//       ["modified_at"]=>
//       NULL
//       ["approval_reject_reason"]=>
//       array(0) {
//       }
//       ["approval_reject_reason_msg"]=>
//       string(0) ""
//       ["approval_reject_reason_description"]=>
//       string(0) ""
//     }
//     [3]=>
//     object(stdClass)#21 (9) {
//       ["reseller_id"]=>
//       string(1) "4"
//       ["reseller_name"]=>
//       string(5) "DS-ie"
//       ["approval_status"]=>
//       string(3) "new"
//       ["approval_status_msg"]=>
//       string(3) "Neu"
//       ["is_siteowner_active"]=>
//       string(1) "N"
//       ["modified_at"]=>
//       NULL
//       ["approval_reject_reason"]=>
//       array(0) {
//       }
//       ["approval_reject_reason_msg"]=>
//       string(0) ""
//       ["approval_reject_reason_description"]=>
//       string(0) ""
//     }
//   }
//   ["image_url"]=>
//   string(0) ""
//   ["user_id"]=>
//   int(918)
//   ["units_left"]=>
//   string(8) "infinite"
//   ["owner_name"]=>
//   string(9) "GoSuccess"
//   ["single_payment_service_period"]=>
//   string(5) "0_day"
//   ["orderform_customer_url"]=>
//   string(42) "https://www.digistore24.com/product/12345"
//   ["orderform_preview_url"]=>
//   string(114) "https://www.digistore24.com/product/12345?testpay=123456789-1233296971j15NIjEW4kXaikLUDyPuLUNsblDVVlnVZOYlrobaY5a3q0L14"
//   ["is_free_upsell_enabled"]=>
//   bool(false)
//   ["is_free_upsell_started"]=>
//   bool(false)
//   ["is_free_upsell_stopped"]=>
//   bool(false)
//   ["upsell_freeflow_thankyou_url"]=>
//   string(0) ""
//   ["owner_id"]=>
//   int(918)
//   ["is_quantity_editable_before_purchase"]=>
//   NULL
//   ["is_quantity_editable_after_purchase"]=>
//   bool(false)
//   ["thankyou_url"]=>
//   string(0) ""
//   ["affiliate_commission"]=>
//   float(0)
//   ["affiliate_commission_fix"]=>
//   float(0)
//   ["affiliate_commission_cur"]=>
//   string(3) "EUR"
//   ["is_address_input_mandatory"]=>
//   bool(false)
//   ["is_phone_no_input_shown"]=>
//   string(6) "hidden"
//   ["is_title_input_shown"]=>
//   bool(false)
//   ["is_name_shown_on_bank_statement"]=>
//   bool(true)
//   ["is_affiliation_auto_accepted"]=>
//   bool(true)
//   ["id"]=>
//   int(12345)
//   ["name_intern"]=>
//   string(21) "My phenomenal product"
//   ["note"]=>
//   string(0) ""
//   ["tag"]=>
//   string(0) ""
//   ["language"]=>
//   string(2) "de"
//   ["created_at"]=>
//   object(DateTime)#15 (3) {
//     ["date"]=>
//     string(26) "2024-08-20 19:09:45.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["modified_at"]=>
//   object(DateTime)#22 (3) {
//     ["date"]=>
//     string(26) "2024-08-20 19:09:45.000000"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
//   ["product_group_id"]=>
//   NULL
//   ["is_active"]=>
//   bool(true)
//   ["currency"]=>
//   string(3) "EUR"
//   ["salespage_url"]=>
//   string(42) "https://www.digistore24.com/product/12345"
//   ["upsell_salespage_url"]=>
//   string(0) ""
//   ["buyer_type"]=>
//   string(8) "consumer"
//   ["has_addr_salutation"]=>
//   string(1) "Y"
//   ["image_id"]=>
//   string(0) ""
//   ["upsell_thankyou_page_url"]=>
//   string(0) ""
//   ["add_order_data_to_thankyou_page_url"]=>
//   string(1) "N"
//   ["add_order_data_to_upsell_sales_page_url"]=>
//   string(1) "N"
//   ["redirect_to_custom_upsell_thankyou_page"]=>
//   string(1) "N"
//   ["add_order_data_to_upsell_thankyou_page_url"]=>
//   string(1) "N"
//   ["product_type_id"]=>
//   int(38)
//   ["stop_sales_at"]=>
//   NULL
//   ["encrypt_order_data_of_thankyou_page_url"]=>
//   string(4) "none"
//   ["encrypt_order_data_of_upsell_thankyou_page_url"]=>
//   string(4) "none"
//   ["is_vat_shown"]=>
//   bool(true)
//   ["is_upsell_double_purchase_prevented"]=>
//   bool(false)
//   ["is_optin_checkbox_shown"]=>
//   bool(false)
//   ["country"]=>
//   string(0) ""
//   ["max_quantity"]=>
//   string(1) "1"
//   ["orderform_id"]=>
//   NULL
//   ["is_phone_no_mandatory"]=>
//   bool(false)
//   ["is_search_engine_allowed"]=>
//   bool(true)
//   ["pay_methods"]=>
//   array(1) {
//     [0]=>
//     string(46) "paypal,banktransfer,test,creditcard,ELV,klarna"
//   }
//   ["service_interval"]=>
//   string(4) "auto"
//   ["service_date"]=>
//   NULL
//   ["notify_payment_emails"]=>
//   string(0) ""
//   ["notify_refund_emails"]=>
//   string(0) ""
//   ["notify_chargeback_emails"]=>
//   string(0) ""
//   ["notify_missed_payment_emails"]=>
//   string(0) ""
//   ["notify_rebilling_start_stop_emails"]=>
//   string(0) ""
//   ["notify_rebilling_payment_emails"]=>
//   string(0) ""
//   ["notify_affiliate_emails"]=>
//   string(0) ""
//   ["notify_addons_for"]=>
//   string(0) ""
//   ["is_deleted"]=>
//   bool(false)
//   ["approval_status"]=>
//   string(0) ""
//   ["approval_status_msg"]=>
//   string(0) ""
//   ["product_group_name"]=>
//   string(0) ""
//   ["paymentplans"]=>
//   NULL
// }
```