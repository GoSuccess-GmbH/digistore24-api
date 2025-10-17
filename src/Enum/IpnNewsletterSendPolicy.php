<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * IPN Newsletter Send Policy
 *
 * Defines when newsletters should be sent via IPN.
 */
enum IpnNewsletterSendPolicy: string
{
    case SEND_IF_NOT_OPTOUT = 'send_if_not_optout';
    case SEND_ALWAYS = 'send_always';
    case SEND_IF_OPTOUT = 'send_if_optout';
    case SEND_IF_OPTIN = 'send_if_optin';
}
