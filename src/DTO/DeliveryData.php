<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Enum\DeliveryStatus;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

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
    public ?DeliveryStatus $type = null;

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
            $data['type'] = $this->type->value;
        }
        if ($this->isShipped !== null) {
            $data['is_shipped'] = TypeConverter::fromBool($this->isShipped);
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
