<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * IPN Timing
 *
 * Defines when IPN notifications should be triggered.
 */
enum IpnTiming: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case BEFORE_THANKYOU = 'before_thankyou';
    case DELAYED = 'delayed';

    public function label(): string
    {
        return match ($this) {
            self::BEFORE_THANKYOU => 'Before Thank You',
            self::DELAYED => 'Delayed',
        };
    }
}
