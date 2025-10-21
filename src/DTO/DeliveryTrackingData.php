<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Delivery Tracking Data Transfer Object
 *
 * Represents tracking information for a delivery/shipment.
 * Uses PHP 8.4 property hooks for read-only access.
 */
final class DeliveryTrackingData extends AbstractDataTransferObject
{
    public ?int $deliveryId {
        get => $this->deliveryId;
    }

    public ?string $parcelServiceType {
        get => $this->parcelServiceType;
    }

    public ?string $serviceLabel {
        get => $this->serviceLabel;
    }

    public ?string $trackingId {
        get => $this->trackingId;
    }

    public ?string $trackingUrl {
        get => $this->trackingUrl;
    }

    public ?int $quantity {
        get => $this->quantity;
    }

    public ?string $ipnConfigId {
        get => $this->ipnConfigId;
    }

    public function __construct(
        ?int $deliveryId = null,
        ?string $parcelServiceType = null,
        ?string $serviceLabel = null,
        ?string $trackingId = null,
        ?string $trackingUrl = null,
        ?int $quantity = null,
        ?string $ipnConfigId = null,
    ) {
        $this->deliveryId = $deliveryId;
        $this->parcelServiceType = $parcelServiceType;
        $this->serviceLabel = $serviceLabel;
        $this->trackingId = $trackingId;
        $this->trackingUrl = $trackingUrl;
        $this->quantity = $quantity;
        $this->ipnConfigId = $ipnConfigId;
    }

    public static function fromArray(array $data): static
    {
        return new self(
            deliveryId: TypeConverter::toInt($data['delivery_id'] ?? null),
            parcelServiceType: TypeConverter::toString($data['parcel_service_type'] ?? null),
            serviceLabel: TypeConverter::toString($data['service_label'] ?? null),
            trackingId: TypeConverter::toString($data['tracking_id'] ?? null),
            trackingUrl: TypeConverter::toString($data['tracking_url'] ?? null),
            quantity: TypeConverter::toInt($data['quantity'] ?? null),
            ipnConfigId: TypeConverter::toString($data['ipn_config_id'] ?? null),
        );
    }
}
