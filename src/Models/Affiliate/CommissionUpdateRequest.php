<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Affiliate;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\Affiliate\ApprovalStatus;

class CommissionUpdateRequest extends Model
{
    public int|string|null $affiliate_id = null;

    public string|array $product_ids = 'all';

    public ?float $commission_rate = null;

    public ?float $commission_fix = null;

    public ?string $commission_currency = null;

    public ?ApprovalStatus $approval_status = null;
}
