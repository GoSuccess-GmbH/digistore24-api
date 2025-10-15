<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Addon Data
 *
 * Represents an add-on product for addon change purchases.
 */
final class AddonData
{
    /**
     * @param int $productId Digistore24 product ID
     * @param float|null $amount The rebilling amount of the subscription
     * @param int $quantity Quantity of the addon (minimum: 1)
     * @param bool $isQuantityEditableAfterPurchase Can buyer change quantity after purchase
     */
    public function __construct(
        public int $productId,
        public ?float $amount = null,
        public int $quantity = 1,
        public bool $isQuantityEditableAfterPurchase = false,
    ) {
        if ($quantity < 1) {
            throw new \InvalidArgumentException('Quantity must be at least 1');
        }
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
            'quantity' => $this->quantity,
            'is_quantity_editable_after_purchase' => $this->isQuantityEditableAfterPurchase ? 'Y' : 'N',
        ];

        if ($this->amount !== null) {
            $data['amount'] = $this->amount;
        }

        return $data;
    }
}
