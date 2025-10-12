<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Purchase;

use GoSuccess\Digistore24\Abstracts\Model;

class ItemUrls extends Model
{
    public ?string $orderform = null;
    
    public ?string $product_edit = null;
}
