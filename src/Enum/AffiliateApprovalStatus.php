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
    case NEW = 'new';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case PENDING = 'pending';
}
