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
    case STOPPED_NOW = 'stopped_now';
    case STOPPED_LATER = 'stopped_later';
    case STOPPED_MANUAL_REBILLING = 'stopped_manual_rebilling';
}
