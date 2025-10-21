<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * IPN Transaction Type
 *
 * Types of transactions that can trigger IPN notifications.
 */
enum IpnTransactionType: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case ALL = 'all';
    case PAYMENT = 'payment';
    case REFUND = 'refund';
    case CHARGEBACK = 'chargeback';
    case PAYMENT_MISSED = 'payment_missed';
    case PAYMENT_DENIAL = 'payment_denial';
    case REBILL_CANCELLED = 'rebill_cancelled';
    case REBILL_RESUMED = 'rebill_resumed';
    case LAST_PAID_DAY = 'last_paid_day';

    public function label(): string
    {
        return match ($this) {
            self::ALL => 'All',
            self::PAYMENT => 'Payment',
            self::REFUND => 'Refund',
            self::CHARGEBACK => 'Chargeback',
            self::PAYMENT_MISSED => 'Payment Missed',
            self::PAYMENT_DENIAL => 'Payment Denial',
            self::REBILL_CANCELLED => 'Rebill Cancelled',
            self::REBILL_RESUMED => 'Rebill Resumed',
            self::LAST_PAID_DAY => 'Last Paid Day',
        };
    }
}
