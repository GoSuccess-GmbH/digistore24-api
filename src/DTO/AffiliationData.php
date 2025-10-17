<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Enum\AffiliateApprovalStatus;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

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
     * @param bool $isOnFirstPmntOnly Whether commission applies only to first payment
     * @param string $productId Product ID
     * @param bool $productIsActive Whether product is active
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
        public bool $isOnFirstPmntOnly,
        public string $productId,
        public bool $productIsActive,
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
            commissionRate: TypeConverter::toString($data['commission_rate'] ?? null) ?? '',
            commissionCurrency: TypeConverter::toString($data['commission_currency'] ?? null) ?? '',
            defaultCommissionRate: TypeConverter::toString($data['default_commission_rate'] ?? null) ?? '',
            defaultCommissionFix: TypeConverter::toString($data['default_commission_fix'] ?? null) ?? '',
            defaultCommissionCurrency: TypeConverter::toString($data['default_commission_currency'] ?? null) ?? '',
            commissionFix: TypeConverter::toString($data['commission_fix'] ?? null) ?? '',
            isOnFirstPmntOnly: TypeConverter::toBool($data['is_on_first_pmnt_only'] ?? null) ?? false,
            productId: TypeConverter::toString($data['product_id'] ?? null) ?? '',
            productIsActive: TypeConverter::toBool($data['product_is_active'] ?? null) ?? false,
            approvalStatus: $approvalStatus,
            approvalStatusMsg: TypeConverter::toString($data['approval_status_msg'] ?? null) ?? '',
        );
    }
}
