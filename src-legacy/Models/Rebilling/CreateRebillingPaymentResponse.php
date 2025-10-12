<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Rebilling;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\Billing\PaymentStatus;
use GoSuccess\Digistore24\Enumerations\Billing\RebillingStatus;

class CreateRebillingPaymentResponse extends Model
{
    public ?string $purchase_id = null;

    public ?PaymentStatus $payment_status = null;

    public ?string $payment_message = null;

    public ?RebillingStatus $billing_status = null;

    public ?bool $payment_data_update_required = null;

    public ?string $payment_data_update_url = null;
}
