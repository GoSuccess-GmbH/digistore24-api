<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Transaction Sort By
 *
 * Defines sort criteria for transaction lists.
 */
enum TransactionSortBy: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case DATE = 'date';
    case EARNING = 'earning';
    case AMOUNT = 'amount';

    public function label(): string
    {
        return match ($this) {
            self::DATE => 'Date',
            self::EARNING => 'Earning',
            self::AMOUNT => 'Amount',
        };
    }
}
