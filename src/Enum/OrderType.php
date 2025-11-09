<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Order Type
 *
 * Defines whether an order is live or test.
 */
enum OrderType: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case LIVE = 'live';
    case TEST = 'test';

    public function label(): string
    {
        return match ($this) {
            self::LIVE => 'Live Order',
            self::TEST => 'Test Order',
        };
    }
}
