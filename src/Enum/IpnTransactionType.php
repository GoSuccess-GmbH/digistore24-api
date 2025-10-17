<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * IPN Transaction Type
 *
 * Types of transactions that can trigger IPN notifications.
 */
enum IpnTransactionType: string
{
    case ALL = 'all';
    case PAYMENT = 'payment';
    case REFUND = 'refund';
    case CHARGEBACK = 'chargeback';
    case PAYMENT_MISSED = 'payment_missed';
    case PAYMENT_DENIAL = 'payment_denial';
    case REBILL_CANCELLED = 'rebill_cancelled';
    case REBILL_RESUMED = 'rebill_resumed';
    case LAST_PAID_DAY = 'last_paid_day';
}
