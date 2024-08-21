<?php

namespace GoSuccess\Digistore24\Models\Billing;

use GoSuccess\Digistore24\Abstracts\Model;

class CreateBillingOnDemandResponse extends Model
{
    public ?string $created_purchase_id = null;
    
    public ?string $payment_status = null;

    public ?string $payment_status_msg = null;

    public ?string $billing_status = null;

    public ?string $billing_status_msg = null;

    public ?string $currency = null;

    public ?float $paid_amount = null;

    public ?float $open_amount = null;

    public ?string $parent_purchase_id = null;

    public ?string $pay_url = null;
}
