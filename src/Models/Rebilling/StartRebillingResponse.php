<?php

namespace GoSuccess\Digistore24\Models\Rebilling;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\Billing\RebillingStatus;

class StartRebillingResponse extends Model
{
    public ?bool $modified = null;

    public ?string $note = null;

    public ?RebillingStatus $billing_status = null;

    public ?string $billing_status_msg = null;

    public ?DateTime $next_payment_at = null;

    public ?bool $rebilling_active = null;
}
