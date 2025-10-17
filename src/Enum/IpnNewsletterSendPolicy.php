<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * IPN Newsletter Send Policy
 *
 * Defines when newsletters should be sent via IPN.
 */
enum IpnNewsletterSendPolicy: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case SEND_IF_NOT_OPTOUT = 'send_if_not_optout';
    case SEND_ALWAYS = 'send_always';
    case SEND_IF_OPTOUT = 'send_if_optout';
    case SEND_IF_OPTIN = 'send_if_optin';

    public function label(): string
    {
        return match ($this) {
            self::SEND_IF_NOT_OPTOUT => 'Send If Not Opt-Out',
            self::SEND_ALWAYS => 'Send Always',
            self::SEND_IF_OPTOUT => 'Send If Opt-Out',
            self::SEND_IF_OPTIN => 'Send If Opt-In',
        };
    }
}
