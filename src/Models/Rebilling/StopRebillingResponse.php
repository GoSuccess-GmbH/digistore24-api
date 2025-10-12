<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Rebilling;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\Billing\RebillingCode;
use GoSuccess\Digistore24\Enumerations\Billing\RebillingStatus;

class StopRebillingResponse extends Model
{
    public ?bool $modified = null;

    public ?string $note = null;

    public ?RebillingCode $code = null;

    public ?RebillingStatus $billing_status = null;

    public ?string $billing_status_msg = null;

    public ?DateTime $next_payment_at = null;

    public ?bool $rebilling_active = null;

    public ?bool $is_cancelled_now = null;

    public ?bool $is_cancelled_later = null;

    public ?DateTime $can_cancel_before = null;
}
