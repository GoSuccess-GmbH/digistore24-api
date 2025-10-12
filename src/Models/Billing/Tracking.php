<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Billing;
use GoSuccess\Digistore24\Abstracts\Model;

class Tracking extends Model
{
    public ?string $custom = null;
    
    public ?string $affiliate = null;

    public ?string $affiliate_priority = null;

    public ?string $campaignkey = null;

    public ?string $trackingkey = null;

    public ?string $utm_source = null;

    public ?string $utm_medium = null;

    public ?string $utm_campaign = null;

    public ?string $utm_term = null;

    public ?string $utm_content = null;
}
