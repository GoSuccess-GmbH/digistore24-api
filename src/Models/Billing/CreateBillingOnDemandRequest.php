<?php

namespace GoSuccess\Digistore24\Models\Billing;
use GoSuccess\Digistore24\Abstracts\Model;

class CreateBillingOnDemandRequest extends Model
{
    public ?string $purchase_id = null;
    
    public ?int $product_id = null;

    public ?Paymentplan $payment_plan = null;

    public ?Tracking $tracking = null;

    public ?array $placeholders = null;

    public ?OrderFormSettings $settings = null;

    public ?array $addons = null;
}
