<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Delivery Details Data Transfer Object
 *
 * Represents complete delivery information including address and tracking.
 * Uses PHP 8.4 property hooks for read-only access.
 */
final class DeliveryDetailsData extends AbstractDataTransferObject
{
    public ?DeliveryAddressData $deliveryAddress {
        get => $this->deliveryAddress;
    }

    public ?string $deliveryType {
        get => $this->deliveryType;
    }

    public ?string $productTypeName {
        get => $this->productTypeName;
    }

    public ?string $invoiceUrl {
        get => $this->invoiceUrl;
    }

    public ?string $deliverySlipUrl {
        get => $this->deliverySlipUrl;
    }

    /**
     * @var DeliveryTrackingData[]
     */
    public array $tracking {
        get => $this->tracking;
    }

    public ?int $quantityTotal {
        get => $this->quantityTotal;
    }

    public ?int $id {
        get => $this->id;
    }

    public ?string $purchaseId {
        get => $this->purchaseId;
    }

    public ?DateTimeImmutable $purchaseCreatedAt {
        get => $this->purchaseCreatedAt;
    }

    public ?int $purchaseItemId {
        get => $this->purchaseItemId;
    }

    public ?int $buyerAddressId {
        get => $this->buyerAddressId;
    }

    public ?string $type {
        get => $this->type;
    }

    public ?DateTimeImmutable $processedAt {
        get => $this->processedAt;
    }

    public ?string $processedBy {
        get => $this->processedBy;
    }

    public ?int $productId {
        get => $this->productId;
    }

    public ?string $productName {
        get => $this->productName;
    }

    public ?int $productTypeId {
        get => $this->productTypeId;
    }

    public ?string $variantLabel {
        get => $this->variantLabel;
    }

    public ?string $variantName {
        get => $this->variantName;
    }

    public ?string $variantKey {
        get => $this->variantKey;
    }

    public ?int $variantId {
        get => $this->variantId;
    }

    public ?int $quantityDelivered {
        get => $this->quantityDelivered;
    }

    public ?string $isShippmentByResellerId {
        get => $this->isShippmentByResellerId;
    }

    public bool $isTestOrder {
        get => $this->isTestOrder;
    }

    /**
     * @param DeliveryTrackingData[] $tracking
     */
    public function __construct(
        ?DeliveryAddressData $deliveryAddress = null,
        ?string $deliveryType = null,
        ?string $productTypeName = null,
        ?string $invoiceUrl = null,
        ?string $deliverySlipUrl = null,
        array $tracking = [],
        ?int $quantityTotal = null,
        ?int $id = null,
        ?string $purchaseId = null,
        ?DateTimeImmutable $purchaseCreatedAt = null,
        ?int $purchaseItemId = null,
        ?int $buyerAddressId = null,
        ?string $type = null,
        ?DateTimeImmutable $processedAt = null,
        ?string $processedBy = null,
        ?int $productId = null,
        ?string $productName = null,
        ?int $productTypeId = null,
        ?string $variantLabel = null,
        ?string $variantName = null,
        ?string $variantKey = null,
        ?int $variantId = null,
        ?int $quantityDelivered = null,
        ?string $isShippmentByResellerId = null,
        bool $isTestOrder = false,
    ) {
        $this->deliveryAddress = $deliveryAddress;
        $this->deliveryType = $deliveryType;
        $this->productTypeName = $productTypeName;
        $this->invoiceUrl = $invoiceUrl;
        $this->deliverySlipUrl = $deliverySlipUrl;
        $this->tracking = $tracking;
        $this->quantityTotal = $quantityTotal;
        $this->id = $id;
        $this->purchaseId = $purchaseId;
        $this->purchaseCreatedAt = $purchaseCreatedAt;
        $this->purchaseItemId = $purchaseItemId;
        $this->buyerAddressId = $buyerAddressId;
        $this->type = $type;
        $this->processedAt = $processedAt;
        $this->processedBy = $processedBy;
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productTypeId = $productTypeId;
        $this->variantLabel = $variantLabel;
        $this->variantName = $variantName;
        $this->variantKey = $variantKey;
        $this->variantId = $variantId;
        $this->quantityDelivered = $quantityDelivered;
        $this->isShippmentByResellerId = $isShippmentByResellerId;
        $this->isTestOrder = $isTestOrder;
    }

    public static function fromArray(array $data): static
    {
        $deliveryAddress = null;
        if (isset($data['delivery_address']) && is_array($data['delivery_address'])) {
            /** @var array<string, mixed> $addressData */
            $addressData = $data['delivery_address'];
            $deliveryAddress = DeliveryAddressData::fromArray($addressData);
        }

        $tracking = [];
        if (isset($data['tracking']) && is_array($data['tracking'])) {
            foreach ($data['tracking'] as $trackingItem) {
                if (is_array($trackingItem)) {
                    /** @var array<string, mixed> $trackingData */
                    $trackingData = $trackingItem;
                    $tracking[] = DeliveryTrackingData::fromArray($trackingData);
                }
            }
        }

        return new self(
            deliveryAddress: $deliveryAddress,
            deliveryType: TypeConverter::toString($data['delivery_type'] ?? null),
            productTypeName: TypeConverter::toString($data['product_type_name'] ?? null),
            invoiceUrl: TypeConverter::toString($data['invoice_url'] ?? null),
            deliverySlipUrl: TypeConverter::toString($data['delivery_slip_url'] ?? null),
            tracking: $tracking,
            quantityTotal: TypeConverter::toInt($data['quantity_total'] ?? null),
            id: TypeConverter::toInt($data['id'] ?? null),
            purchaseId: TypeConverter::toString($data['purchase_id'] ?? null),
            purchaseCreatedAt: TypeConverter::toDateTime($data['purchase_created_at'] ?? null),
            purchaseItemId: TypeConverter::toInt($data['purchase_item_id'] ?? null),
            buyerAddressId: TypeConverter::toInt($data['buyer_address_id'] ?? null),
            type: TypeConverter::toString($data['type'] ?? null),
            processedAt: TypeConverter::toDateTime($data['processed_at'] ?? null),
            processedBy: TypeConverter::toString($data['processed_by'] ?? null),
            productId: TypeConverter::toInt($data['product_id'] ?? null),
            productName: TypeConverter::toString($data['product_name'] ?? null),
            productTypeId: TypeConverter::toInt($data['product_type_id'] ?? null),
            variantLabel: TypeConverter::toString($data['variant_label'] ?? null),
            variantName: TypeConverter::toString($data['variant_name'] ?? null),
            variantKey: TypeConverter::toString($data['variant_key'] ?? null),
            variantId: TypeConverter::toInt($data['variant_id'] ?? null),
            quantityDelivered: TypeConverter::toInt($data['quantity_delivered'] ?? null),
            isShippmentByResellerId: TypeConverter::toString($data['is_shippment_by_reseller_id'] ?? null),
            isTestOrder: TypeConverter::toBool($data['is_test_order'] ?? null) ?? false,
        );
    }
}
