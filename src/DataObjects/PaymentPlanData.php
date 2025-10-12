<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\DataObjects;

/**
 * Payment Plan Data
 * 
 * Immutable data object for payment plan information.
 */
readonly class PaymentPlanData
{
    public ?float $firstAmount;
    public ?float $otherAmounts;
    public ?string $currency;
    public ?int $numberOfInstallments;
    public ?string $firstBillingInterval;
    public ?string $otherBillingIntervals;
    public ?string $testInterval;
    public ?string $template;
    public ?string $upgradeOrderId;
    public ?string $upgradeType;
    public ?string $taxMode;

    public function __construct(
        ?float $firstAmount = null,
        ?float $otherAmounts = null,
        ?string $currency = null,
        ?int $numberOfInstallments = null,
        ?string $firstBillingInterval = null,
        ?string $otherBillingIntervals = null,
        ?string $testInterval = null,
        ?string $template = null,
        ?string $upgradeOrderId = null,
        ?string $upgradeType = null,
        ?string $taxMode = null,
    ) {
        if ($currency !== null && strlen($currency) !== 3) {
            throw new \InvalidArgumentException("Currency must be 3-letter code: {$currency}");
        }

        $this->firstAmount = $firstAmount;
        $this->otherAmounts = $otherAmounts;
        $this->currency = $currency !== null ? strtoupper($currency) : null;
        $this->numberOfInstallments = $numberOfInstallments;
        $this->firstBillingInterval = $firstBillingInterval;
        $this->otherBillingIntervals = $otherBillingIntervals;
        $this->testInterval = $testInterval;
        $this->template = $template;
        $this->upgradeOrderId = $upgradeOrderId;
        $this->upgradeType = $upgradeType;
        $this->taxMode = $taxMode;
    }
}
