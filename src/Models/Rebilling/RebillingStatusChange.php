<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Rebilling;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\IPN\TransactionType;

class RebillingStatusChange extends Model
{
    public ?int $id = null;

    public ?string $purchase_id = null;
    
    public ?DateTime $created_at = null;

    public ?int $pay_sequence_no = null;

    public ?TransactionType $type = null;

    public ?string $type_msg = null;
}
