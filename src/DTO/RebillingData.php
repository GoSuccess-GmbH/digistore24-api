<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;

/**
 * Rebilling Data Transfer Object
 *
 * Contains rebilling status and modification information.
 */
final class RebillingData extends AbstractDataTransferObject
{
    /**
     * Whether rebilling was modified
     */
    public bool $modified = false {
        get => $this->modified;
    }

    /**
     * Note text on the outcome
     */
    public ?string $note = null {
        get => $this->note;
    }

    /**
     * Code indicating the outcome (stop only)
     */
    public ?string $code = null {
        get => $this->code;
    }

    /**
     * Current billing status
     */
    public ?string $billingStatus = null {
        get => $this->billingStatus;
    }

    /**
     * Human-readable billing status message
     */
    public ?string $billingStatusMsg = null {
        get => $this->billingStatusMsg;
    }

    /**
     * Date of the next payment
     */
    public ?DateTimeImmutable $nextPaymentAt = null {
        get => $this->nextPaymentAt;
    }

    /**
     * Whether rebilling is active
     */
    public bool $rebillingActive = false {
        get => $this->rebillingActive;
    }

    /**
     * Whether order is canceled immediately (stop only)
     */
    public ?bool $isCancelledNow = null {
        get => $this->isCancelledNow;
    }

    /**
     * Whether order is canceled later (stop only)
     */
    public ?bool $isCancelledLater = null {
        get => $this->isCancelledLater;
    }

    /**
     * Earliest possible cancellation date (stop only)
     */
    public ?string $canCancelBefore = null {
        get => $this->canCancelBefore;
    }
}
