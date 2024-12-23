<?php

namespace GoSuccess\Digistore24\Enumerations\Billing;

enum RebillingStatus: string {
    case Paying = 'paying';
    case Aborted = 'aborted';
    case Unpaid = 'unpaid';
    case Completed = 'completed';
}
