<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Voucher;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class Coupon extends Model
{
    public ?string $affiliate_name = null;
    public ?float $first_rate = null;
    public ?float $other_rates = null;
    public ?int $id = null;
    public ?string $code = null;
    public ?DateTime $valid_from = null;
    public ?DateTime $expires_at = null;
    public ?string $product_ids = null;
    public ?float $first_amount = null;
    public ?float $other_amounts = null;
    public ?string $upgrade_policy = null;
    public ?bool $is_count_limited = null;
    public ?int $count_left = null;
    public ?string $currency = null;
    public ?bool $is_active = null;
    public ?string $note = null;
    public ?int $affiliate_id = null;
}
