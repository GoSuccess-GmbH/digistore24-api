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
    case SendIfNotOptout = 'send_if_not_optout';
    case SendAlways = 'send_always';
    case SendIfOptout = 'send_if_optout';
    case SendIfOptin = 'send_if_optin';
}
