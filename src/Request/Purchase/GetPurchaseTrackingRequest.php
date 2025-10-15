<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Request to get purchase tracking details
 *
 * @link https://digistore24.com/api/docs/paths/getPurchaseTracking.yaml OpenAPI Specification
 */
final class GetPurchaseTrackingRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId Single Digistore24 order ID or comma-separated list of order IDs
     */
    public function __construct(
        public string $purchaseId,
    ) {
    }

    public function toArray(): array
    {
        return [
            'purchase_id' => $this->purchaseId,
        ];
    }

    public function getEndpoint(): string
    {
        return '/getPurchaseTracking';
    }
}