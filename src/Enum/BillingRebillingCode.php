<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Billing Rebilling Code
 *
 * Codes indicating how rebilling was stopped.
 */
enum BillingRebillingCode: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case STOPPED_NOW = 'stopped_now';
    case STOPPED_LATER = 'stopped_later';
    case STOPPED_MANUAL_REBILLING = 'stopped_manual_rebilling';

    public function label(): string
    {
        return match ($this) {
            self::STOPPED_NOW => 'Stopped Now',
            self::STOPPED_LATER => 'Stopped Later',
            self::STOPPED_MANUAL_REBILLING => 'Stopped Manual Rebilling',
        };
    }
}
