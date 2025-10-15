<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Shipping Cost Policy Data Transfer Object
 *
 * Data structure for shipping cost policy creation and updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createShippingCostPolicy.yaml
 * @link https://digistore24.com/api/docs/paths/updateShippingCostPolicy.yaml
 */
final class ShippingCostPolicyData
{
    /**
     * Name of the shipping cost policy
     * Maximum 63 characters
     */
    public string $name {
        set {
            if (strlen($value) > 63) {
                throw new \InvalidArgumentException('Name must not exceed 63 characters');
            }
            $this->name = $value;
        }
    }

    /**
     * Label shown on orderform
     * Replace XX with language code (e.g., label_en, label_de)
     * Maximum 63 characters
     */
    public ?string $labelXX = null {
        set {
            if ($value !== null && strlen($value) > 63) {
                throw new \InvalidArgumentException('Label must not exceed 63 characters');
            }
            $this->labelXX = $value;
        }
    }

    /**
     * Display position
     */
    public int $position = 100 {
        set {
            if ($value < 0) {
                throw new \InvalidArgumentException('Position must be positive');
            }
            $this->position = $value;
        }
    }

    /**
     * Whether the policy is active
     */
    public bool $isActive = true;

    /**
     * Comma-separated list of product IDs this policy applies to
     * Default: "all"
     */
    public string $forProductIds = 'all';

    /**
     * Comma-separated list of ISO country codes (e.g., US,DE)
     * Default: "all"
     */
    public string $forCountries = 'all';

    /**
     * Comma-separated list of currency codes (e.g., USD,EUR)
     * Default: "all"
     */
    public string $forCurrencies = 'all';

    /**
     * Type of fee calculation
     */
    public string $feeType = 'total_fee' {
        set {
            if (! in_array($value, ['total_fee', 'fee_per_unit'], true)) {
                throw new \InvalidArgumentException(
                    "Invalid fee type: $value. Allowed: total_fee, fee_per_unit",
                );
            }
            $this->feeType = $value;
        }
    }

    /**
     * When the shipping fee is charged
     */
    public string $billingCycle = 'once' {
        set {
            if (! in_array($value, ['once', 'monthly'], true)) {
                throw new \InvalidArgumentException(
                    "Invalid billing cycle: $value. Allowed: once, monthly",
                );
            }
            $this->billingCycle = $value;
        }
    }

    /**
     * Currency code for the fees (e.g., USD, EUR)
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
     * Number of discount levels (1-5)
     */
    public int $scaleLevelCount = 1 {
        set {
            if ($value < 1 || $value > 5) {
                throw new \InvalidArgumentException('Scale level count must be between 1 and 5');
            }
            $this->scaleLevelCount = $value;
        }
    }

    /**
     * Base shipping cost amount
     */
    public ?float $scale1Amount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Scale 1 amount must be positive');
            }
            $this->scale1Amount = $value;
        }
    }

    /**
     * Number of items for second discount level
     */
    public ?int $scale2From = null;

    /**
     * Shipping cost for scale_2_from or more items
     */
    public ?float $scale2Amount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Scale 2 amount must be positive');
            }
            $this->scale2Amount = $value;
        }
    }

    /**
     * Number of items for third discount level
     */
    public ?int $scale3From = null;

    /**
     * Shipping cost for scale_3_from or more items
     */
    public ?float $scale3Amount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Scale 3 amount must be positive');
            }
            $this->scale3Amount = $value;
        }
    }

    /**
     * Number of items for fourth discount level
     */
    public ?int $scale4From = null;

    /**
     * Shipping cost for scale_4_from or more items
     */
    public ?float $scale4Amount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Scale 4 amount must be positive');
            }
            $this->scale4Amount = $value;
        }
    }

    /**
     * Number of items for fifth discount level
     */
    public ?int $scale5From = null;

    /**
     * Shipping cost for scale_5_from or more items
     */
    public ?float $scale5Amount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Scale 5 amount must be positive');
            }
            $this->scale5Amount = $value;
        }
    }

    /**
     * Create ShippingCostPolicyData from array
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->name = $data['name'];
        $instance->labelXX = $data['label_XX'] ?? null;
        $instance->position = $data['position'] ?? 100;
        $instance->isActive = $data['is_active'] ?? true;
        $instance->forProductIds = $data['for_product_ids'] ?? 'all';
        $instance->forCountries = $data['for_countries'] ?? 'all';
        $instance->forCurrencies = $data['for_currencies'] ?? 'all';
        $instance->feeType = $data['fee_type'] ?? 'total_fee';
        $instance->billingCycle = $data['billing_cycle'] ?? 'once';
        $instance->currency = $data['currency'] ?? null;
        $instance->scaleLevelCount = $data['scale_level_count'] ?? 1;
        $instance->scale1Amount = isset($data['scale_1_amount']) ? (float)$data['scale_1_amount'] : null;
        $instance->scale2From = $data['scale_2_from'] ?? null;
        $instance->scale2Amount = isset($data['scale_2_amount']) ? (float)$data['scale_2_amount'] : null;
        $instance->scale3From = $data['scale_3_from'] ?? null;
        $instance->scale3Amount = isset($data['scale_3_amount']) ? (float)$data['scale_3_amount'] : null;
        $instance->scale4From = $data['scale_4_from'] ?? null;
        $instance->scale4Amount = isset($data['scale_4_amount']) ? (float)$data['scale_4_amount'] : null;
        $instance->scale5From = $data['scale_5_from'] ?? null;
        $instance->scale5Amount = isset($data['scale_5_amount']) ? (float)$data['scale_5_amount'] : null;

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
            'name' => $this->name,
            'position' => $this->position,
            'is_active' => $this->isActive,
            'for_product_ids' => $this->forProductIds,
            'for_countries' => $this->forCountries,
            'for_currencies' => $this->forCurrencies,
            'fee_type' => $this->feeType,
            'billing_cycle' => $this->billingCycle,
            'scale_level_count' => $this->scaleLevelCount,
        ];

        if ($this->labelXX !== null) {
            $data['label_XX'] = $this->labelXX;
        }

        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }

        if ($this->scale1Amount !== null) {
            $data['scale_1_amount'] = $this->scale1Amount;
        }

        if ($this->scale2From !== null) {
            $data['scale_2_from'] = $this->scale2From;
        }

        if ($this->scale2Amount !== null) {
            $data['scale_2_amount'] = $this->scale2Amount;
        }

        if ($this->scale3From !== null) {
            $data['scale_3_from'] = $this->scale3From;
        }

        if ($this->scale3Amount !== null) {
            $data['scale_3_amount'] = $this->scale3Amount;
        }

        if ($this->scale4From !== null) {
            $data['scale_4_from'] = $this->scale4From;
        }

        if ($this->scale4Amount !== null) {
            $data['scale_4_amount'] = $this->scale4Amount;
        }

        if ($this->scale5From !== null) {
            $data['scale_5_from'] = $this->scale5From;
        }

        if ($this->scale5Amount !== null) {
            $data['scale_5_amount'] = $this->scale5Amount;
        }

        return $data;
    }
}
