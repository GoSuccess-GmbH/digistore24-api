<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DataTransferObject;

use GoSuccess\Digistore24\Api\Enum\AffiliateApprovalStatus;

/**
 * Affiliation Data
 *
 * Represents affiliate commission data for a specific product.
 */
final readonly class AffiliationData
{
    /**
     * @param string $commissionRate Commission rate as percentage
     * @param string $commissionCurrency Currency code for commission
     * @param string $defaultCommissionRate Default commission rate as percentage
     * @param string $defaultCommissionFix Default fixed commission amount
     * @param string $defaultCommissionCurrency Default commission currency code
     * @param string $commissionFix Fixed commission amount
     * @param string $isOnFirstPmntOnly Whether commission applies only to first payment
     * @param string $productId Product ID
     * @param string $productIsActive Whether product is active ("Y" or "N")
     * @param AffiliateApprovalStatus $approvalStatus Approval status
     * @param string $approvalStatusMsg Human-readable approval status message
     */
    public function __construct(
        public string $commissionRate,
        public string $commissionCurrency,
        public string $defaultCommissionRate,
        public string $defaultCommissionFix,
        public string $defaultCommissionCurrency,
        public string $commissionFix,
        public string $isOnFirstPmntOnly,
        public string $productId,
        public string $productIsActive,
        public AffiliateApprovalStatus $approvalStatus,
        public string $approvalStatusMsg,
    ) {
    }

    /**
     * Create from API response array
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $approvalStatus = AffiliateApprovalStatus::PENDING;
        if (isset($data['approval_status']) && is_string($data['approval_status'])) {
            $parsed = AffiliateApprovalStatus::fromString($data['approval_status']);
            if ($parsed !== null) {
                $approvalStatus = $parsed;
            }
        }

        return new self(
            commissionRate: is_string($data['commission_rate'] ?? null) ? $data['commission_rate'] : '',
            commissionCurrency: is_string($data['commission_currency'] ?? null) ? $data['commission_currency'] : '',
            defaultCommissionRate: is_string($data['default_commission_rate'] ?? null) ? $data['default_commission_rate'] : '',
            defaultCommissionFix: is_string($data['default_commission_fix'] ?? null) ? $data['default_commission_fix'] : '',
            defaultCommissionCurrency: is_string($data['default_commission_currency'] ?? null) ? $data['default_commission_currency'] : '',
            commissionFix: is_string($data['commission_fix'] ?? null) ? $data['commission_fix'] : '',
            isOnFirstPmntOnly: is_string($data['is_on_first_pmnt_only'] ?? null) ? $data['is_on_first_pmnt_only'] : '',
            productId: is_string($data['product_id'] ?? null) ? $data['product_id'] : '',
            productIsActive: is_string($data['product_is_active'] ?? null) ? $data['product_is_active'] : '',
            approvalStatus: $approvalStatus,
            approvalStatusMsg: is_string($data['approval_status_msg'] ?? null) ? $data['approval_status_msg'] : '',
        );
    }
}
