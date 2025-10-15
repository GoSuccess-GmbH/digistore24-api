<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Voucher Data Transfer Object
 *
 * Data structure for voucher creation and updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createVoucher.yaml
 * @link https://digistore24.com/api/docs/paths/updateVoucher.yaml
 */
final class VoucherData
{
    /**
     * The voucher code
     */
    public string $code;

    /**
     * Comma-separated list of product IDs this voucher applies to
     * Default: "all"
     */
    public string $productIds = 'all';

    /**
     * Point in time from when the code becomes valid
     * Format: YYYY-MM-DD HH:MM:SS (e.g., 2017-12-31 12:00:00)
     */
    public ?string $validFrom = null;

    /**
     * Point in time when the code becomes invalid
     * Format: YYYY-MM-DD HH:MM:SS
     */
    public ?string $expiresAt = null;

    /**
     * Discount percentage on first payment (subscriptions/installments) or single payment
     */
    public ?float $firstRate = null {
        set {
            if ($value !== null && ($value < 0 || $value > 100)) {
                throw new \InvalidArgumentException('First rate must be between 0 and 100');
            }
            $this->firstRate = $value;
        }
    }

    /**
     * Discount percentage on follow-up payments (subscriptions/installments)
     */
    public ?float $otherRates = null {
        set {
            if ($value !== null && ($value < 0 || $value > 100)) {
                throw new \InvalidArgumentException('Other rates must be between 0 and 100');
            }
            $this->otherRates = $value;
        }
    }

    /**
     * Fixed discount amount on first/single payment
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
     * Fixed discount amount on follow-up payments
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
     * Currency code for the fixed discount amounts
     */
    public ?string $currency = null {
        set {
            if ($value !== null && strlen($value) !== 3) {
                throw new \InvalidArgumentException('Currency must be 3-character code (e.g., USD, EUR)');
            }
            $this->currency = $value !== null ? strtoupper($value) : null;
        }
    }

    /**
     * Whether the number of uses is limited
     */
    public bool $isCountLimited = false;

    /**
     * Number of remaining uses if isCountLimited is true
     */
    public int $countLeft = 1 {
        set {
            if ($value < 0) {
                throw new \InvalidArgumentException('Count left must be positive');
            }
            $this->countLeft = $value;
        }
    }

    /**
     * How the code is used for upgrades
     *
     * - valid: voucher fully usable
     * - other_only: only discount on follow-up installments
     * - not_valid: voucher not usable
     */
    public string $upgradePolicy = 'valid' {
        set {
            if (! in_array($value, ['valid', 'other_only', 'not_valid'], true)) {
                throw new \InvalidArgumentException(
                    "Invalid upgrade policy: $value. Allowed: valid, other_only, not_valid",
                );
            }
            $this->upgradePolicy = $value;
        }
    }

    /**
     * Create VoucherData from array
     *
     * @param array{
     *     code: string,
     *     product_ids?: string,
     *     valid_from?: string|null,
     *     expires_at?: string|null,
     *     first_rate?: float|null,
     *     other_rates?: float|null,
     *     first_amount?: float|null,
     *     other_amounts?: float|null,
     *     currency?: string|null,
     *     is_count_limited?: bool,
     *     count_left?: int,
     *     upgrade_policy?: string
     * } $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->code = $data['code'];
        $instance->productIds = $data['product_ids'] ?? 'all';
        $instance->validFrom = $data['valid_from'] ?? null;
        $instance->expiresAt = $data['expires_at'] ?? null;
        $instance->firstRate = isset($data['first_rate']) ? (float)$data['first_rate'] : null;
        $instance->otherRates = isset($data['other_rates']) ? (float)$data['other_rates'] : null;
        $instance->firstAmount = isset($data['first_amount']) ? (float)$data['first_amount'] : null;
        $instance->otherAmounts = isset($data['other_amounts']) ? (float)$data['other_amounts'] : null;
        $instance->currency = $data['currency'] ?? null;
        $instance->isCountLimited = $data['is_count_limited'] ?? false;
        $instance->countLeft = $data['count_left'] ?? 1;
        $instance->upgradePolicy = $data['upgrade_policy'] ?? 'valid';

        return $instance;
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [
            'code' => $this->code,
            'product_ids' => $this->productIds,
            'is_count_limited' => $this->isCountLimited,
            'count_left' => $this->countLeft,
            'upgrade_policy' => $this->upgradePolicy,
        ];

        if ($this->validFrom !== null) {
            $data['valid_from'] = $this->validFrom;
        }

        if ($this->expiresAt !== null) {
            $data['expires_at'] = $this->expiresAt;
        }

        if ($this->firstRate !== null) {
            $data['first_rate'] = $this->firstRate;
        }

        if ($this->otherRates !== null) {
            $data['other_rates'] = $this->otherRates;
        }

        if ($this->firstAmount !== null) {
            $data['first_amount'] = $this->firstAmount;
        }

        if ($this->otherAmounts !== null) {
            $data['other_amounts'] = $this->otherAmounts;
        }

        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }

        return $data;
    }
}
