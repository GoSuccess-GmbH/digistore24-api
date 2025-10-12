<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Affiliate;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\Affiliate\ApprovalStatus;

class Affiliation extends Model
{
    public ?float $commission_rate = null;

    public ?string $commission_currency = null;

    public ?float $default_commission_rate = null;

    public ?float $default_commission_fix = null;

    public ?string $default_commission_currency = null;

    public ?float $commission_fix = null;

    public ?string $is_on_first_pmnt_only = null;

    public ?int $product_id = null;

    public ?bool $product_is_active = null;

    public ?ApprovalStatus $approval_status = null;

    public ?string $approval_status_msg = null;
}
