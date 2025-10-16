<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * Billing Rebilling Status
 *
 * Status of recurring billing for a subscription.
 */
enum BillingRebillingStatus: string
{
    case Paying = 'paying';
    case Aborted = 'aborted';
    case Unpaid = 'unpaid';
    case Completed = 'completed';
}
