<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;

/**
 * Delivery Data Transfer Object
 *
 * Data structure for delivery status updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/updateDelivery.yaml
 */
final class DeliveryData extends AbstractDataTransferObject
{
    /**
     * The type of delivery status
     */
    public ?string $type = null {
        set {
            if ($value !== null && ! in_array($value, ['request', 'in_progress', 'delivery', 'partial_delivery', 'return', 'cancel'], true)) {
                throw new \InvalidArgumentException("Invalid delivery type: {$value}. Allowed: request, in_progress, delivery, partial_delivery, return, cancel");
            }
            $this->type = $value;
        }
    }

    /**
     * Whether the product has been shipped
     *
     * Y = The product has been shipped (type is set to 'delivery')
     * N = The delivery was cancelled (type is set to 'cancel')
     */
    public ?bool $isShipped = null;

    /**
     * Sets the delivery quantity to the given value
     */
    public ?int $quantityDelivered = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Quantity delivered must be positive');
            }
            $this->quantityDelivered = $value;
        }
    }

    /**
     * Adds the given value to the delivery quantity
     */
    public ?int $addQuantityDelivered = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Add quantity delivered must be positive');
            }
            $this->addQuantityDelivered = $value;
        }
    }

    /**
     * If you are a fulfillment center, set this parameter to your code
     * if is_shippment_by_reseller_id is set for a delivery
     */
    public ?string $isShippedByResellerFrom = null;

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];
        if ($this->type !== null) {
            $data['type'] = $this->type;
        }
        if ($this->isShipped !== null) {
            // Convert boolean to Digistore24's Y/N format
            $data['is_shipped'] = $this->isShipped ? 'Y' : 'N';
        }
        if ($this->quantityDelivered !== null) {
            $data['quantity_delivered'] = $this->quantityDelivered;
        }
        if ($this->addQuantityDelivered !== null) {
            $data['add_quantity_delivered'] = $this->addQuantityDelivered;
        }
        if ($this->isShippedByResellerFrom !== null) {
            $data['is_shipped_by_reseller_from'] = $this->isShippedByResellerFrom;
        }

        return $data;
    }
}
