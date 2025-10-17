<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Payment Plan Full Data Transfer Object
 *
 * Complete data structure for payment plan creation and updates.
 * Extends beyond the basic PaymentPlanData with additional settings.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createPaymentplan.yaml
 * @link https://digistore24.com/api/docs/paths/updatePaymentplan.yaml
 */
final class PaymentPlanFullData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * Amount of first payment
     */
    public ?float $firstAmount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('First amount must be positive');
            }
            $this->firstAmount = $value;
        }
    }

    /**
     * Interval between purchase and second payment
     * Examples: 4_day, 1_week, 1_month, 3_month, 6_month, 12_month
     */
    public ?string $firstBillingInterval = null;

    /**
     * Three-character currency code
     */
    public ?string $currency = null {
        set {
            if ($value !== null && strlen($value) !== 3) {
                throw new \InvalidArgumentException('Currency must be 3-character code');
            }
            $this->currency = $value !== null ? strtoupper($value) : null;
        }
    }

    /**
     * Amount for follow-up payments
     */
    public ?float $otherAmounts = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Other amounts must be positive');
            }
            $this->otherAmounts = $value;
        }
    }

    /**
     * Interval for follow-up payments
     * Examples: 1_week, 1_month, 3_month, 6_month, 12_month
     */
    public ?string $otherBillingIntervals = null;

    /**
     * Number of installments
     * 0 = subscription (indefinite)
     * 1 = single payment
     * >= 2 = installment plan
     */
    public ?int $numberOfInstallments = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Number of installments must be non-negative');
            }
            $this->numberOfInstallments = $value;
        }
    }

    /**
     * Whether the payment plan is active
     */
    public ?bool $isActive = null;

    /**
     * Cancellation policy (minimum term)
     * Format: {minimum_term}m_{notice_period}m
     * Examples: 6m_0, 6m_6m, 12m_3m, 24m_12m
     */
    public ?string $cancelPolicy = null {
        set {
            $allowedPolicies = ['6m_0', '6m_6m', '6m_12m', '12m_0', '12m_3m', '12m_6m', '12m_12m', '24m_0', '24m_6m', '24m_12m'];
            if ($value !== null && ! in_array($value, $allowedPolicies, true)) {
                throw new \InvalidArgumentException("Invalid cancel policy: {$value}. Allowed: " . implode(', ', $allowedPolicies));
            }
            $this->cancelPolicy = $value;
        }
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];
        if ($this->firstAmount !== null) {
            $data['first_amount'] = $this->firstAmount;
        }
        if ($this->firstBillingInterval !== null) {
            $data['first_billing_interval'] = $this->firstBillingInterval;
        }
        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }
        if ($this->otherAmounts !== null) {
            $data['other_amounts'] = $this->otherAmounts;
        }
        if ($this->otherBillingIntervals !== null) {
            $data['other_billing_intervals'] = $this->otherBillingIntervals;
        }
        if ($this->numberOfInstallments !== null) {
            $data['number_of_installments'] = $this->numberOfInstallments;
        }
        if ($this->isActive !== null) {
            $data['is_active'] = $this->isActive ? 'Y' : 'N';
        }
        if ($this->cancelPolicy !== null) {
            $data['cancel_policy'] = $this->cancelPolicy;
        }

        return $data;
    }
}
