<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Billing Rebilling Status
 *
 * Status of recurring billing for a subscription.
 */
enum BillingRebillingStatus: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case PAYING = 'paying';
    case ABORTED = 'aborted';
    case UNPAID = 'unpaid';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::PAYING => 'Paying',
            self::ABORTED => 'Aborted',
            self::UNPAID => 'Unpaid',
            self::COMPLETED => 'Completed',
        };
    }
}
