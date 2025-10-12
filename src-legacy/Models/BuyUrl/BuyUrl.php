<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\BuyUrl;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class BuyUrl extends Model
{
    public ?int $id = null;
    
    public ?DateTime $created_at = null;
    
    public ?DateTime $valid_from = null;
    
    public ?DateTime $valid_until = null;
    
    public ?int $product_id = null;
    
    public ?string $url = null;
    
    public ?string $email = null;
}
