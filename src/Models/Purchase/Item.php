<?php

namespace GoSuccess\Digistore24\Models\Purchase;

use GoSuccess\Digistore24\Abstracts\Model;

class Item extends Model
{
    public ?string $delivery_type = null;
    
    public ?string $product_type_name = null;
    
    public ?string $product_name = null;
    
    public ?string $product_name_intern = null;
    
    public ?int $product_id = null;
    
    public ?int $product_type_id = null;
    
    public ?int $quantity = null;
    
    public ?string $variant_key = null;
    
    public ?string $variant_name = null;
    
    public ?int $no = null;
    
    public ?int $count = null;
    
    public ?int $id = null;
    
    public ?bool $product_is_active = null;
    
    public ?bool $product_is_deleted = null;
    
    public ?float $vat_rate = null;
    
    public ?ItemAmounts $amounts = null;
    
    public ?ItemUrls $urls = null;
}
