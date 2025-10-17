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
    case USER = 'user';
    case AFFILIATE = 'affiliate';
    case VENDOR = 'vendor';
    case OPERATOR = 'operator';
    case ADMIN = 'admin';
    case MERCHANT = 'merchant';
}
