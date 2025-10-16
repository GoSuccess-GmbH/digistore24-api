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
    case All = 'all';
    case Payment = 'payment';
    case Refund = 'refund';
    case Chargeback = 'chargeback';
    case PaymentMissed = 'payment_missed';
    case PaymentDenial = 'payment_denial';
    case RebillCancelled = 'rebill_cancelled';
    case RebillResumed = 'rebill_resumed';
    case LastPaidDay = 'last_paid_day';
}
