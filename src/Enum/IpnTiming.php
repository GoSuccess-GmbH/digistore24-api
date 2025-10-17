<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * IPN Timing
 *
 * Defines when IPN notifications should be triggered.
 */
enum IpnTiming: string
{
    case BEFORE_THANKYOU = 'before_thankyou';
    case DELAYED = 'delayed';
}
