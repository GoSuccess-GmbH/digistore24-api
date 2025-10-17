<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * Payment Plan Data Transfer Object
 *
 * Represents payment plan information for API requests and responses.
 * Uses PHP 8.4 property hooks for automatic validation.
 */
final class PaymentPlanData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    public ?float $firstAmount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('First amount must be positive');
            }
            $this->firstAmount = $value;
        }
    }

    public ?float $otherAmounts = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Other amounts must be positive');
            }
            $this->otherAmounts = $value;
        }
    }

    public ?string $currency = null {
        set {
            if ($value !== null && !Validator::isCurrencyCode($value)) {
                throw new \InvalidArgumentException("Currency must be 3-letter code: {$value}");
            }
            $this->currency = $value !== null ? strtoupper($value) : null;
        }
    }

    public ?int $numberOfInstallments = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Number of installments must be non-negative');
            }
            $this->numberOfInstallments = $value;
        }
    }

    public ?string $firstBillingInterval = null;

    public ?string $otherBillingIntervals = null;

    public ?string $testInterval = null;

    public ?string $template = null;

    public ?string $upgradeOrderId = null;

    public ?string $upgradeType = null {
        set {
            if ($value !== null && !in_array($value, ['upgrade', 'downgrade', 'special_offer'], true)) {
                throw new \InvalidArgumentException("Invalid upgrade type: {$value}. Allowed: upgrade, downgrade, special_offer");
            }
            $this->upgradeType = $value;
        }
    }

    public ?string $taxMode = null {
        set {
            if ($value !== null && !in_array($value, ['net', 'gross'], true)) {
                throw new \InvalidArgumentException("Invalid tax mode: {$value}. Allowed: net, gross");
            }
            $this->taxMode = $value;
        }
    }
}
