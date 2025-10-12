<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Enumerations\Billing;

enum RebillingStatus: string {
    case Paying = 'paying';
    case Aborted = 'aborted';
    case Unpaid = 'unpaid';
    case Completed = 'completed';
}
