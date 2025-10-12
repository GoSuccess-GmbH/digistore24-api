<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Enumerations\Affiliate;

enum ApprovalStatus: string
{
    case New = 'new';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Pending = 'pending';
}
