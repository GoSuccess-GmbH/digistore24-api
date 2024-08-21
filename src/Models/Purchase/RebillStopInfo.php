<?php

namespace GoSuccess\Digistore24\Models\Purchase;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class RebillStopInfo extends Model
{
    public ?bool $can_stop = null;
    
    public ?string $icon_html = null;
    
    public ?DateTime $stop_date = null;
    
    public ?string $buton_label = null;
    
    public ?string $confirmation_message = null;
    
    public ?string $message = null;
    
    public ?string $code = null;
}
