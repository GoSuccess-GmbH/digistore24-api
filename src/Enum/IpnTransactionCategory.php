<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * IPN Transaction Category
 *
 * Categories of transactions that can trigger IPN notifications.
 */
enum IpnTransactionCategory: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case ORDERS = 'orders';
    case AFFILIATIONS = 'affiliations';
    case ETICKETS = 'etickets';
    case CUSTOMFORMS = 'customforms';
    case ORDERFORM = 'orderform';

    public function label(): string
    {
        return match ($this) {
            self::ORDERS => 'Orders',
            self::AFFILIATIONS => 'Affiliations',
            self::ETICKETS => 'E-Tickets',
            self::CUSTOMFORMS => 'Custom Forms',
            self::ORDERFORM => 'Order Form',
        };
    }
}
