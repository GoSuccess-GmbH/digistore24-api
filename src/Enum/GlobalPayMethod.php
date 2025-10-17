<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * Global Payment Method
 *
 * Available payment methods in Digistore24.
 */
enum GlobalPayMethod: string
{
    case TEST = 'test';
    case PAYPAL = 'paypal';
    case SEZZLE = 'sezzle';
    case CREDITCARD = 'creditcard';
    case ELV = 'ELV';
    case BANKTRANSFER = 'banktransfer';
    case KLARNA = 'klarna';
}
