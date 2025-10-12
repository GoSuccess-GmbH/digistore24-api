<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Purchase;
use GoSuccess\Digistore24\Abstracts\Model;

class RefundPolicy extends Model
{
    public ?string $purchase_id = null;
    
    public ?string $reason_code = null;
    
    public ?int $refund_days = null;
    
    public ?bool $is_reminder_allowed = null;
    
    public ?int $policy_id = null;
    
    public ?int $product_type_id = null;
    
    public ?string $delivery_type = null;
    
    public ?string $checkbox_text = null;
}
