<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Purchase;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class CancelPolicy extends Model
{
    public ?string $purchase_id = null;
    
    public ?string $first_minimum_interval = null;
    
    public ?string $other_minimum_intervals = null;
    
    public ?DateTime $can_cancel_before = null;
}
