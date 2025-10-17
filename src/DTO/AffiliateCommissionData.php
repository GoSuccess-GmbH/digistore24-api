<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * Affiliate Commission Data Transfer Object
 *
 * Data structure for affiliate commission updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/updateAffiliateCommission.yaml
 */
final class AffiliateCommissionData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * Percentage of the affiliate commission
     */
    public ?float $commissionRate = null {
        set {
            if ($value !== null && ($value < 0 || $value > 100)) {
                throw new \InvalidArgumentException('Commission rate must be between 0 and 100');
            }
            $this->commissionRate = $value;
        }
    }

    /**
     * Commission amount (in the specified currency)
     */
    public ?float $commissionFix = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Commission fix must be positive');
            }
            $this->commissionFix = $value;
        }
    }

    /**
     * Currency of the commission amount (if specified)
     */
    public ?string $commissionCurrency = null {
        set {
            if ($value !== null && !Validator::isCurrencyCode($value)) {
                throw new \InvalidArgumentException('Commission currency must be 3-character code');
            }
            $this->commissionCurrency = $value !== null ? strtoupper($value) : null;
        }
    }

    /**
     * Approval status of the affiliation
     */
    public ?string $approvalStatus = null {
        set {
            if ($value !== null && ! in_array($value, ['new', 'approved', 'rejected', 'pending'], true)) {
                throw new \InvalidArgumentException("Invalid approval status: {$value}. Allowed: new, approved, rejected, pending");
            }
            $this->approvalStatus = $value;
        }
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];
        if ($this->commissionRate !== null) {
            $data['commission_rate'] = $this->commissionRate;
        }
        if ($this->commissionFix !== null) {
            $data['commission_fix'] = $this->commissionFix;
        }
        if ($this->commissionCurrency !== null) {
            $data['commission_currency'] = $this->commissionCurrency;
        }
        if ($this->approvalStatus !== null) {
            $data['approval_status'] = $this->approvalStatus;
        }

        return $data;
    }
}
