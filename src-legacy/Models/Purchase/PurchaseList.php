<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Purchase;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class PurchaseList extends Model
{
    public ?DateTime $from = null;
    
    public ?DateTime $to = null;
    
    public ?int $item_count = null;
    
    public ?int $page_size = null;
    
    public ?int $page_no = null;
    
    public ?int $page_count = null;
    
    public ?array $purchase_list = null;
}
