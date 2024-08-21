<?php

namespace GoSuccess\Digistore24\Models\Purchase;
use GoSuccess\Digistore24\Abstracts\Model;

class CreateUpgradePurchaseResponse extends Model
{
    public ?array $new_purchase = null;
    
    public ?array $upgrade_info = null;
}
