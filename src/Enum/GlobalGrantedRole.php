<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * Global Granted Role
 *
 * User roles in the Digistore24 system.
 */
enum GlobalGrantedRole: string
{
    case User = 'user';
    case Affiliate = 'affiliate';
    case Vendor = 'vendor';
    case Operator = 'operator';
    case Admin = 'admin';
    case Merchant = 'merchant';
}
