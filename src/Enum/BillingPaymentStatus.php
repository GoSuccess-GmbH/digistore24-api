<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * Billing Payment Status
 *
 * Status of a billing payment transaction.
 */
enum BillingPaymentStatus: string
{
    case Completed = 'completed';
    case Pending = 'pending';
    case Uncertain = 'uncertain';
    case Refused = 'refused';
    case Error = 'error';
}
