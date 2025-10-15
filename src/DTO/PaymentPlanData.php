<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Payment Plan Data Transfer Object
 *
 * Represents payment plan information for API requests and responses.
 * Uses PHP 8.4 property hooks for automatic validation.
 */
final class PaymentPlanData
{
    public ?float $firstAmount = null;

    public ?float $otherAmounts = null;

    public ?string $currency = null {
        set {
            if ($value !== null && strlen($value) !== 3) {
                throw new \InvalidArgumentException("Currency must be 3-letter code: {$value}");
            }
            $this->currency = $value !== null ? strtoupper($value) : null;
        }
    }

    public ?int $numberOfInstallments = null;

    public ?string $firstBillingInterval = null;

    public ?string $otherBillingIntervals = null;

    public ?string $testInterval = null;

    public ?string $template = null;

    public ?string $upgradeOrderId = null;

    public ?string $upgradeType = null;

    public ?string $taxMode = null;
}
