<?php

namespace GoSuccess\Digistore24\Models\Purchase;

use GoSuccess\Digistore24\Abstracts\Model;

class Balance extends Model
{
    public ?float $old_balance = null;
    
    public ?float $new_balance = null;
}
