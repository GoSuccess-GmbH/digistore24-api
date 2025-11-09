<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Sort Order
 *
 * Defines sort order for list operations.
 */
enum SortOrder: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case ASC = 'asc';
    case DESC = 'desc';

    public function label(): string
    {
        return match ($this) {
            self::ASC => 'Ascending',
            self::DESC => 'Descending',
        };
    }
}
