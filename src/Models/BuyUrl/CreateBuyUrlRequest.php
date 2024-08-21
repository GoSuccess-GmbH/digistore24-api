<?php

namespace GoSuccess\Digistore24\Models\BuyUrl;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Attributes\ArrayItemType;
use GoSuccess\Digistore24\Models\Billing\Paymentplan;
use GoSuccess\Digistore24\Models\Buyer\Buyer;

class CreateBuyUrlRequest extends Model
{
    public ?int $product_id = null;
    
    public ?Buyer $buyer = null;
    
    public ?Paymentplan $payment_plan = null;
    
    public ?Tracking $tracking = null;
    
    public ?string $valid_until = null;
    
    public ?Urls $urls = null;
    
    public ?array $placeholders = null;
    
    public ?OrderFormSettings $settings = null;
    
    public ?array $addons = null;
}
