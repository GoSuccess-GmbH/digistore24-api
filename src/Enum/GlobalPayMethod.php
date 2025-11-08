<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Global Payment Method
 *
 * Available payment methods in Digistore24.
 */
enum GlobalPayMethod: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case TEST = 'test';
    case PAYPAL = 'paypal';
    case SEZZLE = 'sezzle';
    case CREDITCARD = 'creditcard';
    case ELV = 'ELV';
    case BANKTRANSFER = 'banktransfer';
    case KLARNA = 'klarna';

    public function label(): string
    {
        return match ($this) {
            self::TEST => 'Test',
            self::PAYPAL => 'PayPal',
            self::SEZZLE => 'Sezzle',
            self::CREDITCARD => 'Credit Card',
            self::ELV => 'ELV',
            self::BANKTRANSFER => 'Bank Transfer',
            self::KLARNA => 'Klarna',
        };
    }
}
