<?php

namespace GoSuccess\Digistore24\Models\Product;

use GoSuccess\Digistore24\Abstracts\Model;
use DateTime;
use GoSuccess\Digistore24\Attributes\ArrayItemType;

class Product extends Model
{
    public ?string $name = null;
    
    public ?string $name_de = null;
    
    public ?string $name_en = null;
    
    public ?string $name_fr = null;
    
    public ?string $name_es = null;
    
    public ?string $name_nl = null;
    
    public ?string $name_it = null;
    
    public ?string $name_pt = null;
    
    public ?string $name_pl = null;
    
    public ?string $name_sl = null;
    
    public ?string $description = null;
    
    public ?string $description_de = null;
    
    public ?string $description_en = null;
    
    public ?string $description_fr = null;
    
    public ?string $description_es = null;
    
    public ?string $description_nl = null;
    
    public ?string $description_it = null;
    
    public ?string $description_pt = null;
    
    public ?string $description_pl = null;
    
    public ?string $description_sl = null;
    
    public ?string $description_thankyou_page = null;
    
    public ?string $description_thankyou_page_de = null;
    
    public ?string $description_thankyou_page_en = null;
    
    public ?string $description_thankyou_page_fr = null;
    
    public ?string $description_thankyou_page_es = null;
    
    public ?string $description_thankyou_page_nl = null;
    
    public ?string $description_thankyou_page_it = null;
    
    public ?string $description_thankyou_page_pt = null;
    
    public ?string $description_thankyou_page_pl = null;
    
    public ?string $description_thankyou_page_sl = null;
    
    public ?string $optin_text = null;
    
    public ?string $optin_text_de = null;
    
    public ?string $optin_text_en = null;
    
    public ?string $optin_text_fr = null;
    
    public ?string $optin_text_es = null;
    
    public ?string $optin_text_nl = null;
    
    public ?string $optin_text_it = null;
    
    public ?string $optin_text_pt = null;
    
    public ?string $optin_text_pl = null;
    
    public ?string $optin_text_sl = null;
    
    public ?array $approval_status_list = null;
    
    public ?string $image_url = null;
    
    public ?int $user_id = null;
    
    public ?string $units_left = null;
    
    public ?string $owner_name = null;
    
    public ?string $single_payment_service_period = null;
    
    public ?string $orderform_customer_url = null;
    
    public ?string $orderform_preview_url = null;
    
    public ?bool $is_free_upsell_enabled = null;
    
    public ?bool $is_free_upsell_started = null;
    
    public ?bool $is_free_upsell_stopped = null;
    
    public ?string $upsell_freeflow_thankyou_url = null;
    
    public ?int $owner_id = null;
    
    public ?bool $is_quantity_editable_before_purchase = null;
    
    public ?bool $is_quantity_editable_after_purchase = null;
    
    public ?string $thankyou_url = null;
    
    public ?float $affiliate_commission = null;
    
    public ?float $affiliate_commission_fix = null;
    
    public ?string $affiliate_commission_cur = null;
    
    public ?bool $is_address_input_mandatory = null;
    
    public ?string $is_phone_no_input_shown = null;
    
    public ?bool $is_title_input_shown = null;
    
    public ?bool $is_name_shown_on_bank_statement = null;
    
    public ?bool $is_affiliation_auto_accepted = null;
    
    public ?int $id = null;
    
    public ?string $name_intern = null;
    
    public ?string $note = null;
    
    public ?string $tag = null;
    
    public ?string $language = null;
    
    public ?DateTime $created_at = null;
    
    public ?DateTime $modified_at = null;
    
    public ?int $product_group_id = null;
    
    public ?bool $is_active = null;
    
    public ?string $currency = null;
    
    public ?string $salespage_url = null;
    
    public ?string $upsell_salespage_url = null;
    
    public ?string $buyer_type = null;
    
    public ?string $has_addr_salutation = null;
    
    public ?string $image_id = null;
    
    public ?string $upsell_thankyou_page_url = null;
    
    public ?string $add_order_data_to_thankyou_page_url = null;
    
    public ?string $add_order_data_to_upsell_sales_page_url = null;
    
    public ?string $redirect_to_custom_upsell_thankyou_page = null;
    
    public ?string $add_order_data_to_upsell_thankyou_page_url = null;
    
    public ?int $product_type_id = null;
    
    public ?DateTime $stop_sales_at = null;
    
    public ?string $encrypt_order_data_of_thankyou_page_url = null;
    
    public ?string $encrypt_order_data_of_upsell_thankyou_page_url = null;
    
    public ?bool $is_vat_shown = null;
    
    public ?bool $is_upsell_double_purchase_prevented = null;
    
    public ?bool $is_optin_checkbox_shown = null;
    
    public ?string $country = null;
    
    public ?string $max_quantity = null;
    
    public ?int $orderform_id = null;
    
    public ?bool $is_phone_no_mandatory = null;
    
    public ?bool $is_search_engine_allowed = null;
    
    public ?array $pay_methods = null;
    
    public ?string $service_interval = null;
    
    public ?DateTime $service_date = null;
    
    public ?string $notify_payment_emails = null;
    
    public ?string $notify_refund_emails = null;
    
    public ?string $notify_chargeback_emails = null;
    
    public ?string $notify_missed_payment_emails = null;
    
    public ?string $notify_rebilling_start_stop_emails = null;
    
    public ?string $notify_rebilling_payment_emails = null;
    
    public ?string $notify_affiliate_emails = null;
    
    public ?string $notify_addons_for = null;
    
    public ?bool $is_deleted = null;
    
    public ?string $approval_status = null;
    
    public ?string $approval_status_msg = null;
    
    public ?string $product_group_name = null;
    
    public ?array $paymentplans = null;
}
