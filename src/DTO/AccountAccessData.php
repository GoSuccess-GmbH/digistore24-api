<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;

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

    public bool $canSeeNonAffiliatePurchases = false {
        get => $this->canSeeNonAffiliatePurchases;
    }

    public bool $canApproveAffiliations = false {
        get => $this->canApproveAffiliations;
    }

    public bool $canSeeEditMarketplaceLink = false {
        get => $this->canSeeEditMarketplaceLink;
    }

    public bool $canEditProducts = false {
        get => $this->canEditProducts;
    }

    public bool $canEditAffiliateCommissions = false {
        get => $this->canEditAffiliateCommissions;
    }

    public bool $canReadMailHistory = false {
        get => $this->canReadMailHistory;
    }

    public bool $canApprovePurchases = false {
        get => $this->canApprovePurchases;
    }

    public bool $canEditPurchasesApprovalPolicy = false {
        get => $this->canEditPurchasesApprovalPolicy;
    }

    public bool $canGivePermissions = false {
        get => $this->canGivePermissions;
    }

    public bool $canSeeRevenue = false {
        get => $this->canSeeRevenue;
    }

    public bool $canEditDiscountVouchers = false {
        get => $this->canEditDiscountVouchers;
    }

    public bool $canCsvExport = false {
        get => $this->canCsvExport;
    }
}
