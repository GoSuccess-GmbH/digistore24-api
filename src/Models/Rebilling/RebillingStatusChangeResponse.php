<?php

namespace GoSuccess\Digistore24\Models\Rebilling;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Attributes\ArrayItemType;

class RebillingStatusChangeResponse extends Model
{
    public ?DateTime $from = null;

    public ?DateTime $to = null;

    #[ArrayItemType(type: 'class', object: 'GoSuccess\Digistore24\Models\Rebilling\RebillingStatusChange')]
    public ?array $items = null;

    public ?int $page_size = null;

    public ?int $page_no = null;

    public ?int $page_count = null;

    public ?int $item_count = null;
}
