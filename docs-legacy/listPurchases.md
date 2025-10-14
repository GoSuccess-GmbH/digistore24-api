```php
<?php

use GoSuccess\Digistore24\API;

require_once __DIR__ . '/vendor/autoload.php';

define( 'DS24_API_KEY', '12345-xxxxxxx' );

$api = new API( DS24_API_KEY );

// Get all purchases from a month ago until now.
$result = $api->purchase->list( from: '-1M' );

// array(2) {
//   [0]=>
//     object(GoSuccess\Digistore24\Models\Purchase\Purchase)#16 (82) {
//     ["renew_url"]=>
//     string(53) "https://www.checkout-ds24.com/renew/A1B2C3D4/447ETRER"
//     ["receipt_url"]=>
//     string(62) "https://www.checkout-ds24.com/receipt/123456/A1B2C3D4/447ETRER"
//     ["invoice_url"]=>
//     string(61) "https://www.checkout-ds24.com/invoice/A1B2C3D4/3/447ETRER.pdf"
//     ["are_customforms_filled_out"]=>
//     bool(false)
//     ["is_canceled_now"]=>
//     bool(false)
//     ["is_canceled_later"]=>
//     bool(false)
//     ["is_cancelable_now"]=>
//     bool(true)
//     ["is_cancelable_later"]=>
//     bool(false)
//     ["can_cancel_before"]=>
//     object(DateTime)#15 (3) {
//         ["date"]=>
//         string(26) "2024-09-19 00:00:00.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//     }
//     ["vendor_name"]=>
//     string(9) "GoSuccess"
//     ["vendor_email"]=>
//     string(19) "support@company.com"
//     ["support_email"]=>
//     string(19) "support@company.com"
//     ["support_contact"]=>
//     string(19) "support@company.com"
//     ["support_phone_no"]=>
//     string(0) ""
//     ["affiliate_name"]=>
//     string(19) "ReallyGoodAffiliate"
//     ["salesteam_name"]=>
//     string(0) ""
//     ["reseller_name"]=>
//     string(30) "Digistore24 GmbH (Deutschland)"
//     ["cancelled_at"]=>
//     NULL
//     ["next_amount"]=>
//     float(29.75)
//     ["refund_policy"]=>
//     object(GoSuccess\Digistore24\Models\Purchase\RefundPolicy)#34 (8) {
//         ["purchase_id"]=>
//         string(8) "A1B2C3D4"
//         ["reason_code"]=>
//         string(7) "default"
//         ["refund_days"]=>
//         int(0)
//         ["is_reminder_allowed"]=>
//         bool(true)
//         ["policy_id"]=>
//         int(32779)
//         ["product_type_id"]=>
//         NULL
//         ["delivery_type"]=>
//         string(0) ""
//         ["checkbox_text"]=>
//         NULL
//     }
//     ["cancel_policy"]=>
//     object(GoSuccess\Digistore24\Models\Purchase\CancelPolicy)#35 (4) {
//         ["purchase_id"]=>
//         string(8) "A1B2C3D4"
//         ["first_minimum_interval"]=>
//         string(7) "0 month"
//         ["other_minimum_intervals"]=>
//         string(7) "0 month"
//         ["can_cancel_before"]=>
//         object(DateTime)#36 (3) {
//         ["date"]=>
//         string(26) "2024-09-19 00:00:00.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//         }
//     }
//     ["can_buyer_terminate_payments"]=>
//     bool(true)
//     ["has_access_data_for_buyer"]=>
//     bool(false)
//     ["rebill_stop_info"]=>
//     object(GoSuccess\Digistore24\Models\Purchase\RebillStopInfo)#37 (7) {
//         ["can_stop"]=>
//         bool(true)
//         ["icon_html"]=>
//         string(181) ""
//         ["stop_date"]=>
//         NULL
//         ["buton_label"]=>
//         string(42) "Hier klicken, um die Zahlungen zu stoppen."
//         ["confirmation_message"]=>
//         string(72) "Die Zahlungen von Bestellung A1B2C3D4 werden jetzt gestoppt.|Fortfahren?"
//         ["message"]=>
//         string(45) "Die Zahlungen können sofort gestoppt werden."
//         ["code"]=>
//         string(11) "stopped_now"
//     }
//     ["is_refundable_now"]=>
//     bool(false)
//     ["last_refund_possible_at"]=>
//     object(DateTime)#38 (3) {
//         ["date"]=>
//         string(26) "2024-06-19 00:00:00.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//     }
//     ["is_uncancellable_installment"]=>
//     bool(false)
//     ["custom"]=>
//     string(0) ""
//     ["other_amounts"]=>
//     float(29.75)
//     ["other_vat_amounts"]=>
//     float(4.75)
//     ["other_merchant_amounts"]=>
//     float(19.48)
//     ["other_affiliate_amounts"]=>
//     float(2.17)
//     ["vendor_id"]=>
//     int(918)
//     ["reseller_id"]=>
//     int(1)
//     ["is_german_tax_installment"]=>
//     bool(false)
//     ["id"]=>
//     string(8) "A1B2C3D4"
//     ["amount"]=>
//     float(29.75)
//     ["vat_rate"]=>
//     float(19)
//     ["created_at"]=>
//     object(DateTime)#39 (3) {
//         ["date"]=>
//         string(26) "2024-06-19 05:28:46.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//     }
//     ["has_custom_forms"]=>
//     bool(false)
//     ["first_billing_interval"]=>
//     string(7) "1_month"
//     ["other_billing_intervals"]=>
//     string(7) "1_month"
//     ["have_rebilling"]=>
//     bool(true)
//     ["is_rebilling_stoppable_now"]=>
//     bool(true)
//     ["start_payplan_at"]=>
//     object(DateTime)#40 (3) {
//         ["date"]=>
//         string(26) "2024-06-19 00:00:00.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//     }
//     ["buyer_id"]=>
//     int(18141656)
//     ["affiliate_id"]=>
//     int(933)
//     ["campaignkey"]=>
//     string(0) ""
//     ["tracking_param"]=>
//     string(17) "email"
//     ["salesteam_id"]=>
//     NULL
//     ["next_payment_at"]=>
//     object(DateTime)#41 (3) {
//         ["date"]=>
//         string(26) "2024-09-19 00:00:00.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//     }
//     ["voucher_code"]=>
//     string(0) ""
//     ["rebill_stop_noted_at"]=>
//     NULL
//     ["upgrade_of_purchase_id"]=>
//     string(0) ""
//     ["upgraded_by_purchase_id"]=>
//     string(0) ""
//     ["total_merchant_amount"]=>
//     float(47.47)
//     ["total_affiliate_amount"]=>
//     float(5.29)
//     ["vendor_key"]=>
//     string(8) "NA5TI6DB"
//     ["delivery_types"]=>
//     string(7) "service"
//     ["delivery_types_msg"]=>
//     string(14) "Dienstleistung"
//     ["billing_type"]=>
//     string(12) "subscription"
//     ["billing_type_msg"]=>
//     string(10) "Abonnement"
//     ["billing_mode"]=>
//     string(4) "auto"
//     ["billing_mode_msg"]=>
//     string(22) "Automatische Zahlungen"
//     ["billing_status"]=>
//     string(6) "paying"
//     ["billing_status_msg"]=>
//     string(15) "Zahlungen aktiv"
//     ["last_transaction_types"]=>
//     string(0) ""
//     ["last_transaction_types_msg"]=>
//     string(0) ""
//     ["details_url"]=>
//     string(74) "https://www.digistore24-app.com/vendor/reports/transactions/order/A1B2C3D4"
//     ["payment_plan_msg"]=>
//     string(19) "Monatlich 29,75 €"
//     ["support_url"]=>
//     string(53) "https://www.digistore24.com/support/A1B2C3D4/447ETRER"
//     ["rebilling_stop_url"]=>
//     string(56) "https://www.digistore24.com/order/stop/A1B2C3D4/4MAJKTM7"
//     ["request_refund_url"]=>
//     string(58) "https://www.digistore24.com/order/cancel/A1B2C3D4/4MAJKTM7"
//     ["items"]=>
//     array(1) {
//         [0]=>
//         object(stdClass)#21 (17) {
//         ["delivery_type"]=>
//         string(7) "service"
//         ["product_type_name"]=>
//         string(42) "Elektronisch erbrachte Fern-Dienstleistung"
//         ["product_name"]=>
//         string(17) "Best Service On The Internet"
//         ["product_name_intern"]=>
//         string(17) "Best Service On The Internet"
//         ["product_id"]=>
//         string(6) "123456"
//         ["product_type_id"]=>
//         string(1) "7"
//         ["quantity"]=>
//         string(1) "1"
//         ["variant_key"]=>
//         string(0) ""
//         ["variant_name"]=>
//         string(0) ""
//         ["no"]=>
//         string(1) "1"
//         ["count"]=>
//         string(1) "1"
//         ["id"]=>
//         string(8) "53137141"
//         ["product_is_active"]=>
//         string(1) "Y"
//         ["product_is_deleted"]=>
//         string(1) "N"
//         ["vat_rate"]=>
//         string(5) "19.00"
//         ["amounts"]=>
//         object(stdClass)#23 (2) {
//             ["first"]=>
//             object(stdClass)#22 (7) {
//             ["product_name"]=>
//             string(17) "Best Service On The Internet"
//             ["total_brutto_amount"]=>
//             float(29.75)
//             ["total_vat_amount"]=>
//             float(4.75)
//             ["total_netto_amount"]=>
//             int(25)
//             ["unit_brutto_amount"]=>
//             float(29.75)
//             ["unit_vat_amount"]=>
//             float(4.75)
//             ["unit_netto_amount"]=>
//             int(25)
//             }
//             ["followup"]=>
//             object(stdClass)#24 (7) {
//             ["product_name"]=>
//             string(17) "Best Service On The Internet"
//             ["total_brutto_amount"]=>
//             float(29.75)
//             ["total_vat_amount"]=>
//             float(4.75)
//             ["total_netto_amount"]=>
//             int(25)
//             ["unit_brutto_amount"]=>
//             float(29.75)
//             ["unit_vat_amount"]=>
//             float(4.75)
//             ["unit_netto_amount"]=>
//             int(25)
//             }
//         }
//         ["urls"]=>
//         object(stdClass)#25 (2) {
//             ["orderform"]=>
//             string(42) "https://www.digistore24.com/product/123456"
//             ["product_edit"]=>
//             string(67) "https://www.digistore24-app.com/vendor/account/products/edit/123456"
//         }
//         }
//     }
//     ["has_etickets"]=>
//     bool(false)
//     ["buyer"]=>
//     object(GoSuccess\Digistore24\Models\Buyer\Buyer)#42 (20) {
//         ["salutation_msg"]=>
//         string(0) ""
//         ["street"]=>
//         string(14) "Business Street 1"
//         ["buyer_type"]=>
//         string(8) "business"
//         ["id"]=>
//         int(29252777)
//         ["address_id"]=>
//         int(44987676)
//         ["street_name"]=>
//         string(12) "Business Street"
//         ["created_at"]=>
//         object(DateTime)#43 (3) {
//         ["date"]=>
//         string(26) "2024-06-19 05:28:46.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//         }
//         ["email"]=>
//         string(17) "boss@company.com"
//         ["first_name"]=>
//         string(4) "John"
//         ["last_name"]=>
//         string(6) "Doe"
//         ["salutation"]=>
//         string(0) ""
//         ["title"]=>
//         string(0) ""
//         ["company"]=>
//         string(13) "Company Inc."
//         ["street_number"]=>
//         string(1) "1"
//         ["street2"]=>
//         string(0) ""
//         ["zipcode"]=>
//         string(5) "12345"
//         ["city"]=>
//         string(10) "Biz City"
//         ["state"]=>
//         string(0) ""
//         ["country"]=>
//         string(2) "DE"
//         ["phone_no"]=>
//         string(0) ""
//     }
//     ["transaction_list"]=>
//     array(3) {
//         [0]=>
//         object(GoSuccess\Digistore24\Models\Purchase\Transaction)#53 (14) {
//         ["invoice_url"]=>
//         string(66) "https://www.digistore24.com/invoice/A1B2C3D4/82173721/447ETRER.pdf"
//         ["id"]=>
//         int(82173721)
//         ["amount"]=>
//         float(29.75)
//         ["currency"]=>
//         string(3) "EUR"
//         ["purchase_id"]=>
//         string(8) "A1B2C3D4"
//         ["pay_method"]=>
//         string(4) "Test"
//         ["pay_method_msg"]=>
//         string(4) "Test"
//         ["created_at"]=>
//         object(DateTime)#52 (3) {
//             ["date"]=>
//             string(26) "2024-06-19 05:28:47.000000"
//             ["timezone_type"]=>
//             int(3)
//             ["timezone"]=>
//             string(3) "UTC"
//         }
//         ["pay_sequence_no"]=>
//         int(1)
//         ["pay_date"]=>
//         NULL
//         ["parent_txn_id"]=>
//         NULL
//         ["type"]=>
//         string(7) "payment"
//         ["type_msg"]=>
//         string(7) "Zahlung"
//         ["refund_info"]=>
//         object(GoSuccess\Digistore24\Models\Purchase\TransactionRefundInfo)#48 (9) {
//             ["can_refund"]=>
//             bool(false)
//             ["icon_html"]=>
//             string(150) "remove_circle_outline"
//             ["button_label"]=>
//             string(6) "Refund"
//             ["refund_amount"]=>
//             float(0)
//             ["refund_currency"]=>
//             string(3) "EUR"
//             ["confirmation_message"]=>
//             string(43) "The refund will now be processed. Continue?"
//             ["no_refund_reason"]=>
//             string(0) ""
//             ["code"]=>
//             string(14) "business_buyer"
//             ["message"]=>
//             string(75) "Keine Rückgabe, da Bestellung ohne Widerrufsrecht und gewerblicher Käufer"
//         }
//         }
//         [1]=>
//         object(GoSuccess\Digistore24\Models\Purchase\Transaction)#50 (14) {
//         ["invoice_url"]=>
//         string(66) "https://www.digistore24.com/invoice/A1B2C3D4/83403412/447ETRER.pdf"
//         ["id"]=>
//         int(83403412)
//         ["amount"]=>
//         float(13.75)
//         ["currency"]=>
//         string(3) "EUR"
//         ["purchase_id"]=>
//         string(8) "A1B2C3D4"
//         ["pay_method"]=>
//         string(4) "Test"
//         ["pay_method_msg"]=>
//         string(4) "Test"
//         ["created_at"]=>
//         object(DateTime)#49 (3) {
//             ["date"]=>
//             string(26) "2024-07-19 00:08:44.000000"
//             ["timezone_type"]=>
//             int(3)
//             ["timezone"]=>
//             string(3) "UTC"
//         }
//         ["pay_sequence_no"]=>
//         int(2)
//         ["pay_date"]=>
//         NULL
//         ["parent_txn_id"]=>
//         NULL
//         ["type"]=>
//         string(7) "payment"
//         ["type_msg"]=>
//         string(7) "Zahlung"
//         ["refund_info"]=>
//         object(GoSuccess\Digistore24\Models\Purchase\TransactionRefundInfo)#44 (9) {
//             ["can_refund"]=>
//             bool(false)
//             ["icon_html"]=>
//             string(150) "remove_circle_outline"
//             ["button_label"]=>
//             string(6) "Refund"
//             ["refund_amount"]=>
//             float(0)
//             ["refund_currency"]=>
//             string(3) "EUR"
//             ["confirmation_message"]=>
//             string(43) "The refund will now be processed. Continue?"
//             ["no_refund_reason"]=>
//             string(0) ""
//             ["code"]=>
//             string(14) "business_buyer"
//             ["message"]=>
//             string(75) "Keine Rückgabe, da Bestellung ohne Widerrufsrecht und gewerblicher Käufer"
//         }
//         }
//         [2]=>
//         object(GoSuccess\Digistore24\Models\Purchase\Transaction)#47 (14) {
//         ["invoice_url"]=>
//         string(66) "https://www.digistore24.com/invoice/A1B2C3D4/84563451/447ETRER.pdf"
//         ["id"]=>
//         int(84563451)
//         ["amount"]=>
//         float(29.75)
//         ["currency"]=>
//         string(3) "EUR"
//         ["purchase_id"]=>
//         string(8) "A1B2C3D4"
//         ["pay_method"]=>
//         string(4) "Test"
//         ["pay_method_msg"]=>
//         string(4) "Test"
//         ["created_at"]=>
//         object(DateTime)#46 (3) {
//             ["date"]=>
//             string(26) "2024-08-19 00:45:25.000000"
//             ["timezone_type"]=>
//             int(3)
//             ["timezone"]=>
//             string(3) "UTC"
//         }
//         ["pay_sequence_no"]=>
//         int(3)
//         ["pay_date"]=>
//         NULL
//         ["parent_txn_id"]=>
//         NULL
//         ["type"]=>
//         string(7) "payment"
//         ["type_msg"]=>
//         string(7) "Zahlung"
//         ["refund_info"]=>
//         object(GoSuccess\Digistore24\Models\Purchase\TransactionRefundInfo)#45 (9) {
//             ["can_refund"]=>
//             bool(false)
//             ["icon_html"]=>
//             string(150) "remove_circle_outline"
//             ["button_label"]=>
//             string(6) "Refund"
//             ["refund_amount"]=>
//             float(0)
//             ["refund_currency"]=>
//             string(3) "EUR"
//             ["confirmation_message"]=>
//             string(43) "The refund will now be processed. Continue?"
//             ["no_refund_reason"]=>
//             string(0) ""
//             ["code"]=>
//             string(14) "business_buyer"
//             ["message"]=>
//             string(75) "Keine Rückgabe, da Bestellung ohne Widerrufsrecht und gewerblicher Käufer"
//         }
//         }
//     }
//     ["last_payment"]=>
//     object(GoSuccess\Digistore24\Models\Purchase\LastPayment)#60 (5) {
//         ["date"]=>
//         object(DateTime)#62 (3) {
//         ["date"]=>
//         string(26) "2024-08-19 00:00:00.000000"
//         ["timezone_type"]=>
//         int(3)
//         ["timezone"]=>
//         string(3) "UTC"
//         }
//         ["pay_method"]=>
//         string(4) "test"
//         ["pay_method_msg"]=>
//         string(12) "Test-Zahlung"
//         ["txn_type"]=>
//         string(7) "payment"
//         ["txn_id"]=>
//         int(84563451)
//     }
//     ["placeholders"]=>
//     NULL
//     ["rebilling_paymethod"]=>
//     string(4) "test"
//     ["rebilling_paymethod_msg"]=>
//     string(12) "Test-Zahlung"
//     ["rebilling_paymethod_details"]=>
//     string(0) ""
//     }
//   [1]=>
//   object(GoSuccess\Digistore24\Models\Purchase\Purchase)#37 (82) {
//     ...
// }
```