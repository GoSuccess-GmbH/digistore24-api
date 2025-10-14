<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Get Purchase Request
 *
 * Retrieves details of a specific purchase/order.
 */
final class GetPurchaseRequest extends AbstractRequest
{
    public function __construct(
        public readonly string $purchaseId,
    ) {
    }

    public function endpoint(): string
    {
        return '/getPurchase';
    }

    public function toArray(): array
    {
        return [
            'purchase_id' => $this->purchaseId,
        ];
    }

    
}
