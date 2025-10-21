<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Global Granted Role
 *
 * User roles in the Digistore24 system.
 */
enum GlobalGrantedRole: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case USER = 'user';
    case AFFILIATE = 'affiliate';
    case VENDOR = 'vendor';
    case OPERATOR = 'operator';
    case ADMIN = 'admin';
    case MERCHANT = 'merchant';

    public function label(): string
    {
        return match ($this) {
            self::USER => 'User',
            self::AFFILIATE => 'Affiliate',
            self::VENDOR => 'Vendor',
            self::OPERATOR => 'Operator',
            self::ADMIN => 'Admin',
            self::MERCHANT => 'Merchant',
        };
    }
}
