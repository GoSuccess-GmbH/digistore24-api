<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

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

    public function __construct(
        bool $modified = false,
        ?string $note = null,
        ?string $code = null,
        ?string $billingStatus = null,
        ?string $billingStatusMsg = null,
        ?DateTimeImmutable $nextPaymentAt = null,
        bool $rebillingActive = false,
        ?bool $isCancelledNow = null,
        ?bool $isCancelledLater = null,
        ?string $canCancelBefore = null,
    ) {
        $this->modified = $modified;
        $this->note = $note;
        $this->code = $code;
        $this->billingStatus = $billingStatus;
        $this->billingStatusMsg = $billingStatusMsg;
        $this->nextPaymentAt = $nextPaymentAt;
        $this->rebillingActive = $rebillingActive;
        $this->isCancelledNow = $isCancelledNow;
        $this->isCancelledLater = $isCancelledLater;
        $this->canCancelBefore = $canCancelBefore;
    }

    /**
     * Create from API response array
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): static
    {
        return new self(
            modified: TypeConverter::toBool($data['modified'] ?? 'N') ?? false,
            note: TypeConverter::toString($data['note'] ?? null),
            code: TypeConverter::toString($data['code'] ?? null),
            billingStatus: TypeConverter::toString($data['billing_status'] ?? null),
            billingStatusMsg: TypeConverter::toString($data['billing_status_msg'] ?? null),
            nextPaymentAt: TypeConverter::toDateTime($data['next_payment_at'] ?? null),
            rebillingActive: TypeConverter::toBool($data['rebilling_active'] ?? 'N') ?? false,
            isCancelledNow: TypeConverter::toBool($data['is_cancelled_now'] ?? null),
            isCancelledLater: TypeConverter::toBool($data['is_cancelled_later'] ?? null),
            canCancelBefore: TypeConverter::toString($data['can_cancel_before'] ?? null),
        );
    }
}
