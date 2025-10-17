<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Enum\AffiliateApprovalStatus;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Affiliation Data
 *
 * Represents affiliate commission data for a specific product.
 * Uses PHP 8.4 property hooks for read-only access.
 */
final class AffiliationData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * Commission rate as percentage
     */
    public string $commissionRate {
        get => $this->commissionRate;
    }

    /**
     * Currency code for commission
     */
    public string $commissionCurrency {
        get => $this->commissionCurrency;
    }

    /**
     * Default commission rate as percentage
     */
    public string $defaultCommissionRate {
        get => $this->defaultCommissionRate;
    }

    /**
     * Default fixed commission amount
     */
    public string $defaultCommissionFix {
        get => $this->defaultCommissionFix;
    }

    /**
     * Default commission currency code
     */
    public string $defaultCommissionCurrency {
        get => $this->defaultCommissionCurrency;
    }

    /**
     * Fixed commission amount
     */
    public string $commissionFix {
        get => $this->commissionFix;
    }

    /**
     * Whether commission applies only to first payment
     */
    public bool $isOnFirstPmntOnly {
        get => $this->isOnFirstPmntOnly;
    }

    /**
     * Product ID
     */
    public string $productId {
        get => $this->productId;
    }

    /**
     * Whether product is active
     */
    public bool $productIsActive {
        get => $this->productIsActive;
    }

    /**
     * Approval status
     */
    public AffiliateApprovalStatus $approvalStatus {
        get => $this->approvalStatus;
    }

    /**
     * Human-readable approval status message
     */
    public string $approvalStatusMsg {
        get => $this->approvalStatusMsg;
    }

    public function __construct(
        string $commissionRate,
        string $commissionCurrency,
        string $defaultCommissionRate,
        string $defaultCommissionFix,
        string $defaultCommissionCurrency,
        string $commissionFix,
        bool $isOnFirstPmntOnly,
        string $productId,
        bool $productIsActive,
        AffiliateApprovalStatus $approvalStatus,
        string $approvalStatusMsg,
    ) {
        $this->commissionRate = $commissionRate;
        $this->commissionCurrency = $commissionCurrency;
        $this->defaultCommissionRate = $defaultCommissionRate;
        $this->defaultCommissionFix = $defaultCommissionFix;
        $this->defaultCommissionCurrency = $defaultCommissionCurrency;
        $this->commissionFix = $commissionFix;
        $this->isOnFirstPmntOnly = $isOnFirstPmntOnly;
        $this->productId = $productId;
        $this->productIsActive = $productIsActive;
        $this->approvalStatus = $approvalStatus;
        $this->approvalStatusMsg = $approvalStatusMsg;
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
