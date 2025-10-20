<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Account Access Data Transfer Object
 *
 * Represents an account access permission entry.
 * Uses PHP 8.4 property hooks for read-only access.
 */
final class AccountAccessData extends AbstractDataTransferObject
{
    public ?int $id {
        get => $this->id;
    }

    public ?int $ownerId {
        get => $this->ownerId;
    }

    public ?int $accessorId {
        get => $this->accessorId;
    }

    public ?string $permissions {
        get => $this->permissions;
    }

    public ?string $permissionsMsg {
        get => $this->permissionsMsg;
    }

    public ?DateTimeImmutable $createdAt {
        get => $this->createdAt;
    }

    public ?DateTimeImmutable $modifiedAt {
        get => $this->modifiedAt;
    }

    public bool $canSeeNonAffiliatePurchases {
        get => $this->canSeeNonAffiliatePurchases;
    }

    public bool $canApproveAffiliations {
        get => $this->canApproveAffiliations;
    }

    public bool $canSeeEditMarketplaceLink {
        get => $this->canSeeEditMarketplaceLink;
    }

    public bool $canEditProducts {
        get => $this->canEditProducts;
    }

    public bool $canEditAffiliateCommissions {
        get => $this->canEditAffiliateCommissions;
    }

    public bool $canReadMailHistory {
        get => $this->canReadMailHistory;
    }

    public bool $canApprovePurchases {
        get => $this->canApprovePurchases;
    }

    public bool $canEditPurchasesApprovalPolicy {
        get => $this->canEditPurchasesApprovalPolicy;
    }

    public bool $canGivePermissions {
        get => $this->canGivePermissions;
    }

    public bool $canSeeRevenue {
        get => $this->canSeeRevenue;
    }

    public bool $canEditDiscountVouchers {
        get => $this->canEditDiscountVouchers;
    }

    public bool $canCsvExport {
        get => $this->canCsvExport;
    }

    public function __construct(
        ?int $id = null,
        ?int $ownerId = null,
        ?int $accessorId = null,
        ?string $permissions = null,
        ?string $permissionsMsg = null,
        ?DateTimeImmutable $createdAt = null,
        ?DateTimeImmutable $modifiedAt = null,
        bool $canSeeNonAffiliatePurchases = false,
        bool $canApproveAffiliations = false,
        bool $canSeeEditMarketplaceLink = false,
        bool $canEditProducts = false,
        bool $canEditAffiliateCommissions = false,
        bool $canReadMailHistory = false,
        bool $canApprovePurchases = false,
        bool $canEditPurchasesApprovalPolicy = false,
        bool $canGivePermissions = false,
        bool $canSeeRevenue = false,
        bool $canEditDiscountVouchers = false,
        bool $canCsvExport = false,
    ) {
        $this->id = $id;
        $this->ownerId = $ownerId;
        $this->accessorId = $accessorId;
        $this->permissions = $permissions;
        $this->permissionsMsg = $permissionsMsg;
        $this->createdAt = $createdAt;
        $this->modifiedAt = $modifiedAt;
        $this->canSeeNonAffiliatePurchases = $canSeeNonAffiliatePurchases;
        $this->canApproveAffiliations = $canApproveAffiliations;
        $this->canSeeEditMarketplaceLink = $canSeeEditMarketplaceLink;
        $this->canEditProducts = $canEditProducts;
        $this->canEditAffiliateCommissions = $canEditAffiliateCommissions;
        $this->canReadMailHistory = $canReadMailHistory;
        $this->canApprovePurchases = $canApprovePurchases;
        $this->canEditPurchasesApprovalPolicy = $canEditPurchasesApprovalPolicy;
        $this->canGivePermissions = $canGivePermissions;
        $this->canSeeRevenue = $canSeeRevenue;
        $this->canEditDiscountVouchers = $canEditDiscountVouchers;
        $this->canCsvExport = $canCsvExport;
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: TypeConverter::toInt($data['id'] ?? null),
            ownerId: TypeConverter::toInt($data['owner_id'] ?? null),
            accessorId: TypeConverter::toInt($data['accessor_id'] ?? null),
            permissions: TypeConverter::toString($data['permissions'] ?? null),
            permissionsMsg: TypeConverter::toString($data['permissions_msg'] ?? null),
            createdAt: TypeConverter::toDateTime($data['created_at'] ?? null),
            modifiedAt: TypeConverter::toDateTime($data['modified_at'] ?? null),
            canSeeNonAffiliatePurchases: TypeConverter::toBool($data['can_see_non_affiliate_purchases'] ?? null) ?? false,
            canApproveAffiliations: TypeConverter::toBool($data['can_approve_affiliations'] ?? null) ?? false,
            canSeeEditMarketplaceLink: TypeConverter::toBool($data['can_see_edit_marketplace_link'] ?? null) ?? false,
            canEditProducts: TypeConverter::toBool($data['can_edit_products'] ?? null) ?? false,
            canEditAffiliateCommissions: TypeConverter::toBool($data['can_edit_affiliate_commissions'] ?? null) ?? false,
            canReadMailHistory: TypeConverter::toBool($data['can_read_mail_history'] ?? null) ?? false,
            canApprovePurchases: TypeConverter::toBool($data['can_approve_purchases'] ?? null) ?? false,
            canEditPurchasesApprovalPolicy: TypeConverter::toBool($data['can_edit_purchases_approval_policy'] ?? null) ?? false,
            canGivePermissions: TypeConverter::toBool($data['can_give_permissions'] ?? null) ?? false,
            canSeeRevenue: TypeConverter::toBool($data['can_see_revenue'] ?? null) ?? false,
            canEditDiscountVouchers: TypeConverter::toBool($data['can_edit_discount_vouchers'] ?? null) ?? false,
            canCsvExport: TypeConverter::toBool($data['can_csv_export'] ?? null) ?? false,
        );
    }
}
