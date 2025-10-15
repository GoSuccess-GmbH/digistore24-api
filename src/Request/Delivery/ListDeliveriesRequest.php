<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Delivery;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Deliveries Request
 *
 * Retrieves a list of deliveries, optionally filtered by purchase ID.
 */
final class ListDeliveriesRequest extends AbstractRequest
{
    /**
     * @param string|null $purchaseId Optional purchase ID to filter deliveries
     */
    public function __construct(
        private ?string $purchaseId = null
    ) {
    }

    public function getEndpoint(): string
    {
        return '/listDeliveries';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        $params = [];
        if ($this->purchaseId !== null) {
            $params['purchase_id'] = $this->purchaseId;
        }
        return $params;
    }
}
