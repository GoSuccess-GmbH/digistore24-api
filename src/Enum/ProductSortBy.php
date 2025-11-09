<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Product Sort By
 *
 * Defines sort criteria for product lists.
 */
enum ProductSortBy: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case NAME = 'name';
    case GROUP = 'group';

    public function label(): string
    {
        return match ($this) {
            self::NAME => 'Name',
            self::GROUP => 'Product Group',
        };
    }
}
