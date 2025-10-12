<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\BuyUrl;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class CreateBuyUrlResponse extends Model
{
    public ?int $id = null;
    
    public ?string $url = null;
    
    public ?DateTime $valid_until = null;
    
    public ?string $upgrade_status = null;

    public ?string $upgrade_type = null;

    public ?array $upgrade_errors = null;
}
