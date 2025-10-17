<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Addon Data
 *
 * Represents an add-on product for addon change purchases.
 * Uses PHP 8.4 property hooks for automatic validation.
 */
final class AddonData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * Digistore24 product ID
     */
    public int $productId;

    /**
     * The rebilling amount of the subscription
     */
    public ?float $amount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Amount must be positive');
            }
            $this->amount = $value;
        }
    }

    /**
     * Quantity of the addon (minimum: 1)
     */
    public int $quantity = 1 {
        set {
            if ($value < 1) {
                throw new \InvalidArgumentException('Quantity must be at least 1');
            }
            $this->quantity = $value;
        }
    }

    /**
     * Can buyer change quantity after purchase
     */
    public bool $isQuantityEditableAfterPurchase = false;

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = ['product_id' => $this->productId, 'quantity' => $this->quantity, 'is_quantity_editable_after_purchase' => $this->isQuantityEditableAfterPurchase ? 'Y' : 'N'];
        if ($this->amount !== null) {
            $data['amount'] = $this->amount;
        }

        return $data;
    }
}
