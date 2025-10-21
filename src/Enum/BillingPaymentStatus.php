<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Billing Payment Status
 *
 * Status of a billing payment transaction.
 */
enum BillingPaymentStatus: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case COMPLETED = 'completed';
    case PENDING = 'pending';
    case UNCERTAIN = 'uncertain';
    case REFUSED = 'refused';
    case ERROR = 'error';

    public function label(): string
    {
        return match ($this) {
            self::COMPLETED => 'Completed',
            self::PENDING => 'Pending',
            self::UNCERTAIN => 'Uncertain',
            self::REFUSED => 'Refused',
            self::ERROR => 'Error',
        };
    }
}
