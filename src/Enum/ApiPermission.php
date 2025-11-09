<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * API Permission Level
 *
 * Permission levels for API keys.
 */
enum ApiPermission: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case READONLY = 'readonly';
    case DELIVERY = 'delivery';
    case WRITABLE = 'writable';

    public function label(): string
    {
        return match ($this) {
            self::READONLY => 'Read Only',
            self::DELIVERY => 'Delivery',
            self::WRITABLE => 'Writable',
        };
    }
}
