<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DataTransferObject;

/**
 * Tracking Info Data Transfer Object
 *
 * Data structure for shipment tracking information used in delivery updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/updateDelivery.yaml
 */
final class TrackingInfoData
{
    /**
     * The parcel service key
     *
     * @link https://www.digistore24.com/support/parcel_services
     */
    public ?string $parcelService = null;

    /**
     * The tracking ID for the shipment
     */
    public ?string $trackingId = null;

    /**
     * Expected delivery date (YYYY-MM-DD format)
     */
    public ?string $expectDeliveryAt = null {
        set {
            if ($value !== null && ! preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
                throw new \InvalidArgumentException(
                    'Expected delivery date must be in YYYY-MM-DD format',
                );
            }
            $this->expectDeliveryAt = $value;
        }
    }

    /**
     * Quantity of items in this tracking entry (default is all items)
     */
    public ?int $quantity = null {
        set {
            if ($value !== null && $value < 1) {
                throw new \InvalidArgumentException('Quantity must be at least 1');
            }
            $this->quantity = $value;
        }
    }

    /**
     * Operation to perform on the tracking information
     */
    public string $operation = 'create_or_update' {
        set {
            if (! in_array($value, ['create_or_update', 'delete'], true)) {
                throw new \InvalidArgumentException(
                    "Invalid operation: $value. Allowed: create_or_update, delete",
                );
            }
            $this->operation = $value;
        }
    }

    /**
     * Create TrackingInfoData from array
     *
     * @param array{
     *     parcel_service?: string|null,
     *     tracking_id?: string|null,
     *     expect_delivery_at?: string|null,
     *     quantity?: int|null,
     *     operation?: string
     * } $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->parcelService = $data['parcel_service'] ?? null;
        $instance->trackingId = $data['tracking_id'] ?? null;
        $instance->expectDeliveryAt = $data['expect_delivery_at'] ?? null;
        $instance->quantity = $data['quantity'] ?? null;
        $instance->operation = $data['operation'] ?? 'create_or_update';

        return $instance;
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = ['operation' => $this->operation];

        if ($this->parcelService !== null) {
            $data['parcel_service'] = $this->parcelService;
        }

        if ($this->trackingId !== null) {
            $data['tracking_id'] = $this->trackingId;
        }

        if ($this->expectDeliveryAt !== null) {
            $data['expect_delivery_at'] = $this->expectDeliveryAt;
        }

        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        }

        return $data;
    }
}
