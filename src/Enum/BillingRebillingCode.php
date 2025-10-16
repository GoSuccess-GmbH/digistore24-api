<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * Billing Rebilling Code
 *
 * Codes indicating how rebilling was stopped.
 */
enum BillingRebillingCode: string
{
    case StoppedNow = 'stopped_now';
    case StoppedLater = 'stopped_later';
    case StoppedManualRebilling = 'stopped_manual_rebilling';
}
