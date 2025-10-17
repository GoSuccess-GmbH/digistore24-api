<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\IntBackedEnum;
use GoSuccess\Digistore24\Api\Trait\IntBackedEnumTrait;

/**
 * Global Reseller
 *
 * Digistore24 reseller entities.
 */
enum GlobalReseller: int implements IntBackedEnum
{
    use IntBackedEnumTrait;

    case DE = 1; // Digistore24 GmbH
    case US = 2; // Digistore24 Inc.
    case UK = 3; // Digistore24 LTD
    case IE = 4; // Digistore24 MSLW

    public function label(): string
    {
        return match ($this) {
            self::DE => 'Germany',
            self::US => 'United States',
            self::UK => 'United Kingdom',
            self::IE => 'Ireland',
        };
    }
}
