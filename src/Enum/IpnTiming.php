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
    case BeforeThankYou = 'before_thankyou';
    case Delayed = 'delayed';
}
