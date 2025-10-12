<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Enumerations\Global;

enum PayMethod: string
{
    case Test = 'test';
    case PayPal = 'paypal';
    case Sezzle = 'sezzle';
    case Creditcard = 'creditcard';
    case ELV = 'ELV';
    case Banktransfer = 'banktransfer';
    case Klarna = 'klarna';
}
