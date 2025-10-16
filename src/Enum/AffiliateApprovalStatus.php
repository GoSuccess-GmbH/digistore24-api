<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * Affiliate Approval Status
 *
 * Status of an affiliate's application or approval.
 */
enum AffiliateApprovalStatus: string
{
    case New = 'new';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Pending = 'pending';
}
