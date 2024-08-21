<?php

namespace GoSuccess\Digistore24\Models\Purchase;
use GoSuccess\Digistore24\Abstracts\Model;

class TrackingUtmParams extends Model
{
    public ?string $utm_source = null;
    
    public ?string $utm_medium = null;
    
    public ?string $utm_campaign = null;
    
    public ?string $utm_term = null;
    
    public ?string $utm_content = null;
}
