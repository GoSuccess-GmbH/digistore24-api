<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\BuyUrl;

use GoSuccess\Digistore24\Abstracts\Model;

class Urls extends Model
{
    public ?string $thankyou_url = null;
    
    public ?string $fallback_url = null;
    
    public ?string $upgrade_error_url = null;
}
