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
    case COMPLETED = 'completed';
    case PENDING = 'pending';
    case UNCERTAIN = 'uncertain';
    case REFUSED = 'refused';
    case ERROR = 'error';
}
