<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DataTransferObject;

/**
 * Buy URL Addon Data Transfer Object
 *
 * Data structure for add-on products in Buy URL creation.
 * Different from AddonData which is used for addon change purchases.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createBuyUrl.yaml
 */
final class BuyUrlAddonData
{
    /**
     * Product ID of addon
     */
    public string $productId;

    /**
     * First payment amount for subscription/installment
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
     * Follow-up payment amounts
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
     * Purchase amount for single payments
     */
    public ?float $singleAmount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Single amount must be positive');
            }
            $this->singleAmount = $value;
        }
    }

    /**
     * Preselected quantity
     */
    public int $defaultQuantity = 1 {
        set {
            if ($value < 1) {
                throw new \InvalidArgumentException('Default quantity must be at least 1');
            }
            $this->defaultQuantity = $value;
        }
    }

    /**
     * Maximum quantity type
     */
    public string $maxQuantityType = 'unlimited' {
        set {
            if (! in_array($value, ['unlimited', 'like_main_item', 'number'], true)) {
                throw new \InvalidArgumentException(
                    "Invalid max quantity type: $value. Allowed: unlimited, like_main_item, number",
                );
            }
            $this->maxQuantityType = $value;
        }
    }

    /**
     * Maximum purchasable quantity (required if maxQuantityType is 'number')
     */
    public ?int $maxQuantity = null {
        set {
            if ($value !== null && $value < 1) {
                throw new \InvalidArgumentException('Max quantity must be at least 1');
            }
            $this->maxQuantity = $value;
        }
    }

    /**
     * Three-character currency code
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
     * Can buyer change quantity before purchase
     */
    public bool $isQuantityEditableBeforePurchase = false;

    /**
     * Can buyer change quantity after purchase
     */
    public bool $isQuantityEditableAfterPurchase = false;

    /**
     * Create BuyUrlAddonData from array
     *
     * @param array{
     *     product_id: string,
     *     first_amount?: float|null,
     *     other_amounts?: float|null,
     *     single_amount?: float|null,
     *     default_quantity?: int,
     *     max_quantity_type?: string,
     *     max_quantity?: int|null,
     *     currency?: string|null,
     *     is_quantity_editable_before_purchase?: string|bool,
     *     is_quantity_editable_after_purchase?: string|bool
     * } $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->productId = $data['product_id'];
        $instance->firstAmount = isset($data['first_amount']) ? (float)$data['first_amount'] : null;
        $instance->otherAmounts = isset($data['other_amounts']) ? (float)$data['other_amounts'] : null;
        $instance->singleAmount = isset($data['single_amount']) ? (float)$data['single_amount'] : null;
        $instance->defaultQuantity = $data['default_quantity'] ?? 1;
        $instance->maxQuantityType = $data['max_quantity_type'] ?? 'unlimited';
        $instance->maxQuantity = $data['max_quantity'] ?? null;
        $instance->currency = $data['currency'] ?? null;

        // Handle Digistore24's Y/N format
        $instance->isQuantityEditableBeforePurchase = isset($data['is_quantity_editable_before_purchase'])
            ? ($data['is_quantity_editable_before_purchase'] === 'Y' || $data['is_quantity_editable_before_purchase'] === true)
            : false;

        $instance->isQuantityEditableAfterPurchase = isset($data['is_quantity_editable_after_purchase'])
            ? ($data['is_quantity_editable_after_purchase'] === 'Y' || $data['is_quantity_editable_after_purchase'] === true)
            : false;

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
            'product_id' => $this->productId,
            'default_quantity' => $this->defaultQuantity,
            'max_quantity_type' => $this->maxQuantityType,
            'is_quantity_editable_before_purchase' => $this->isQuantityEditableBeforePurchase ? 'Y' : 'N',
            'is_quantity_editable_after_purchase' => $this->isQuantityEditableAfterPurchase ? 'Y' : 'N',
        ];

        if ($this->firstAmount !== null) {
            $data['first_amount'] = $this->firstAmount;
        }

        if ($this->otherAmounts !== null) {
            $data['other_amounts'] = $this->otherAmounts;
        }

        if ($this->singleAmount !== null) {
            $data['single_amount'] = $this->singleAmount;
        }

        if ($this->maxQuantity !== null) {
            $data['max_quantity'] = $this->maxQuantity;
        }

        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }

        return $data;
    }
}
