<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Delivery;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Get Delivery Request
 *
 * Retrieves delivery information for a specific delivery ID.
 */
final class GetDeliveryRequest extends AbstractRequest
{
    /**
     * @param string $deliveryId The delivery ID
     * @param bool $setInProgress If true, marks the delivery as in progress if not already marked
     */
    public function __construct(
        private string $deliveryId,
        private bool $setInProgress = false,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/api/getDelivery';
    }

    public function getMethod(): HttpMethod
    {
        return HttpMethod::GET;
    }

    public function toArray(): array
    {
        return [
            'delivery_id' => $this->deliveryId,
            'set_in_progress' => $this->setInProgress ? 'true' : 'false',
        ];
    }
}
