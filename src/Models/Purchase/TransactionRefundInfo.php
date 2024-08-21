<?php

namespace GoSuccess\Digistore24\Models\Purchase;

use GoSuccess\Digistore24\Abstracts\Model;

class TransactionRefundInfo extends Model
{
    public ?bool $can_refund = null;
    
    public ?string $icon_html = null;
    
    public ?string $button_label = null;
    
    public ?float $refund_amount = null;
    
    public ?string $refund_currency = null;
    
    public ?string $confirmation_message = null;
    
    public ?string $no_refund_reason = null;
    
    public ?string $code = null;
    
    public ?string $message = null;
}
