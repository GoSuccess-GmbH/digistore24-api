<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Buyer Type
 *
 * Represents the type of buyer.
 */
enum BuyerType: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case BUSINESS = 'business';
    case CONSUMER = 'consumer';
    case COMMON = 'common';
    case VENDOR = 'vendor';

    /**
     * Get human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::BUSINESS => 'Business',
            self::CONSUMER => 'Consumer',
            self::COMMON => 'Common',
            self::VENDOR => 'Vendor',
        };
    }
}
