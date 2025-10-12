<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Purchase;

use GoSuccess\Digistore24\Abstracts\Model;

class ItemAmounts extends Model
{
    public ?ItemAmountsAmount $first = null;
    
    public ?ItemAmountsAmount $followup = null;
}
