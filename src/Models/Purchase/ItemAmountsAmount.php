<?php

namespace GoSuccess\Digistore24\Models\Purchase;

use GoSuccess\Digistore24\Abstracts\Model;

class ItemAmountsAmount extends Model
{
    public ?string $product_name = null;
    
    public ?float $total_brutto_amount = null;
    
    public ?float $total_vat_amount = null;
    
    public ?float $total_netto_amount = null;
    
    public ?float $unit_brutto_amount = null;
    
    public ?float $unit_vat_amount = null;
    
    public ?float $unit_netto_amount = null;
}
