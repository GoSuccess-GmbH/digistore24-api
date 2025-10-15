<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Delivery;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Get Delivery Request
 *
 * Retrieves delivery information for a specific delivery ID.
 */
final class GetDeliveryRequest extends AbstractRequest
{
    /**
     * @param string $deliveryId The delivery ID
     */
    public function __construct(
        private string $deliveryId
    ) {
    }

    public function getEndpoint(): string
    {
        return '/getDelivery';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        return ['delivery_id' => $this->deliveryId];
    }
}
