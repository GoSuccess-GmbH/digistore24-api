<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Enumerations\Billing;

enum RebillingCode: string {
    case StoppedNow = 'stopped_now';
    case StoppedLater = 'stopped_later';
    case StoppedManualRebilling = 'stopped_manual_rebilling';
}
