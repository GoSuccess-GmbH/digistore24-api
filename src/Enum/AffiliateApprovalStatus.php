<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Affiliate Approval Status
 *
 * Status of an affiliate's application or approval.
 */
enum AffiliateApprovalStatus: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case NEW = 'new';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case PENDING = 'pending';

    public function label(): string
    {
        return match ($this) {
            self::NEW => 'New',
            self::APPROVED => 'Approved',
            self::REJECTED => 'Rejected',
            self::PENDING => 'Pending',
        };
    }
}
