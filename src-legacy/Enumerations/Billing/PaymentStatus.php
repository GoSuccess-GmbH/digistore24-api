<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Enumerations\Billing;

enum PaymentStatus: string
{
    case Completed = 'completed';
    case Pending = 'pending';
    case Uncertain = 'uncertain';
    case Refused = 'refused';
    case Error = 'error';
}
