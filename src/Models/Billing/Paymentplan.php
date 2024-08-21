<?php

namespace GoSuccess\Digistore24\Models\Billing;

use GoSuccess\Digistore24\Abstracts\Model;
use DateTime;

class Paymentplan extends Model
{
    public ?string $description = null;
    
    public ?DateTime $start_payplan_at = null;

    public ?string $test_interval = null;

    public ?string $billing_type = null;

    public ?int $id = null;

    public ?int $product_id = null;

    public ?DateTime $created_at = null;

    public ?DateTime $modified_at = null;

    public ?string $currency = null;

    public ?float $first_amount = null;

    public ?float $other_amounts = null;

    public ?int $number_of_installments = null;

    public ?string $other_billing_intervals = null;

    public ?string $first_billing_interval = null;

    public ?int $position = null;

    public ?bool $is_active = null;

    public ?string $cancel_policy = null;

    public ?bool $is_switching_allowed = null;

    public ?bool $can_buyer_terminate_installments = null;

    public ?string $is_for_sale = null;

    public ?string $is_for_sale_msg = null;

    public ?RenderedTexts $rendered_texts = null;

    public ?string $upgrade_order_id = null;
}
