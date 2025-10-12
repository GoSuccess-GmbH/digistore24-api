<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Purchase;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Attributes\ArrayItemType;
use GoSuccess\Digistore24\Models\Buyer\Buyer;

class Purchase extends Model
{
    public ?string $renew_url = null;
    
    public ?string $receipt_url = null;
    
    public ?string $invoice_url = null;
    
    public ?bool $are_customforms_filled_out = null;
    
    public ?bool $is_canceled_now = null;
    
    public ?bool $is_canceled_later = null;
    
    public ?bool $is_cancelable_now = null;
    
    public ?bool $is_cancelable_later = null;
    
    public ?DateTime $can_cancel_before = null;
    
    public ?string $vendor_name = null;
    
    public ?string $vendor_email = null;
    
    public ?string $support_email = null;
    
    public ?string $support_contact = null;
    
    public ?string $support_phone_no = null;
    
    public ?string $affiliate_name = null;
    
    public ?string $salesteam_name = null;
    
    public ?string $reseller_name = null;
    
    public ?DateTime $cancelled_at = null;
    
    public ?float $next_amount = null;
    
    public ?RefundPolicy $refund_policy = null;
    
    public ?CancelPolicy $cancel_policy = null;
    
    public ?bool $can_buyer_terminate_payments = null;
    
    public ?bool $has_access_data_for_buyer = null;
    
    public ?RebillStopInfo $rebill_stop_info = null;
    
    public ?bool $is_refundable_now = null;
    
    public ?DateTime $last_refund_possible_at = null;
    
    public ?bool $is_uncancellable_installment = null;
    
    public ?string $custom = null;
    
    public ?float $other_amounts = null;
    
    public ?float $other_vat_amounts = null;
    
    public ?float $other_merchant_amounts = null;
    
    public ?float $other_affiliate_amounts = null;
    
    public ?int $vendor_id = null;
    
    public ?int $reseller_id = null;
    
    public ?bool $is_german_tax_installment = null;
    
    public ?string $id = null;
    
    public ?float $amount = null;
    
    public ?float $vat_rate = null;
    
    public ?DateTime $created_at = null;
    
    public ?bool $has_custom_forms = null;
    
    public ?string $first_billing_interval = null;
    
    public ?string $other_billing_intervals = null;
    
    public ?bool $have_rebilling = null;
    
    public ?bool $is_rebilling_stoppable_now = null;
    
    public ?DateTime $start_payplan_at = null;
    
    public ?int $buyer_id = null;
    
    public ?int $affiliate_id = null;
    
    public ?string $campaignkey = null;
    
    public ?string $tracking_param = null;
    
    public ?int $salesteam_id = null;
    
    public ?DateTime $next_payment_at = null;
    
    public ?string $voucher_code = null;
    
    public ?DateTime $rebill_stop_noted_at = null;
    
    public ?string $upgrade_of_purchase_id = null;
    
    public ?string $upgraded_by_purchase_id = null;
    
    public ?float $total_merchant_amount = null;
    
    public ?float $total_affiliate_amount = null;
    
    public ?string $vendor_key = null;
    
    public ?string $delivery_types = null;
    
    public ?string $delivery_types_msg = null;
    
    public ?string $billing_type = null;
    
    public ?string $billing_type_msg = null;
    
    public ?string $billing_mode = null;
    
    public ?string $billing_mode_msg = null;
    
    public ?string $billing_status = null;
    
    public ?string $billing_status_msg = null;
    
    public ?string $last_transaction_types = null;
    
    public ?string $last_transaction_types_msg = null;
    
    public ?string $details_url = null;
    
    public ?string $payment_plan_msg = null;
    
    public ?string $support_url = null;
    
    public ?string $rebilling_stop_url = null;
    
    public ?string $request_refund_url = null;
    
    public ?array $items = null;
    
    public ?bool $has_etickets = null;
    
    public ?Buyer $buyer = null;
    
    #[ArrayItemType(type: 'class', object: 'GoSuccess\Digistore24\Models\Purchase\Transaction')]
    public ?array $transaction_list = null;
    
    public ?LastPayment $last_payment = null;
    
    public ?array $placeholders = null;
    
    public ?string $rebilling_paymethod = null;
    
    public ?string $rebilling_paymethod_msg = null;
    
    public ?string $rebilling_paymethod_details = null;
}
