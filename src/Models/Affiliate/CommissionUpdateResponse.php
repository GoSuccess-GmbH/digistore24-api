<?php

namespace GoSuccess\Digistore24\Models\Affiliate;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Attributes\ArrayItemType;

class CommissionUpdateResponse extends Model
{
    public ?bool $modified = null;

    public ?int $affiliate_id = null;

    public ?array $not_create_reasons = null;

    #[ArrayItemType(type: 'int')]
    public ?array $created_product_ids = null;

    #[ArrayItemType(type: 'int')]
    public ?array $modified_product_ids = null;
    
    #[ArrayItemType(type: 'int')]
    public ?array $unmodified_product_ids = null;
}
