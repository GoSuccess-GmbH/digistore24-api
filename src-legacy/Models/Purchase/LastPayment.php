<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Purchase;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class LastPayment extends Model
{
    public ?DateTime $date = null;
    
    public ?string $pay_method = null;
    
    public ?string $pay_method_msg = null;
    
    public ?string $txn_type = null;
    
    public ?int $txn_id = null;
}
