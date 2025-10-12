<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Purchase;
use GoSuccess\Digistore24\Abstracts\Model;

class Tracking extends Model
{
    public ?TrackingUtmParams $utm_params = null;
    
    public ?string $click_id = null;
    
    public ?array $sub_ids = null;
    
    public ?string $vendor_key = null;
    
    public ?string $campaign_key = null;
}
