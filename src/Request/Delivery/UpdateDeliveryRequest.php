<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Delivery;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\DeliveryData;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Update Delivery Request
 *
 * Updates delivery information such as tracking number and shipping status.
 */
final class UpdateDeliveryRequest extends AbstractRequest
{
    /**
     * @param string $deliveryId The delivery ID
     * @param DeliveryData $delivery Delivery data to update
     */
    public function __construct(
        private string $deliveryId,
        private DeliveryData $delivery,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/updateDelivery';
    }

    public function method(): Method
    {
        return Method::POST;
    }

    public function toArray(): array
    {
        return array_merge(
            ['delivery_id' => $this->deliveryId],
            $this->delivery->toArray(),
        );
    }
}
