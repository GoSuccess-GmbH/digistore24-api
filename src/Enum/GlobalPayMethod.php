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
    case Test = 'test';
    case PayPal = 'paypal';
    case Sezzle = 'sezzle';
    case Creditcard = 'creditcard';
    case ELV = 'ELV';
    case Banktransfer = 'banktransfer';
    case Klarna = 'klarna';
}
