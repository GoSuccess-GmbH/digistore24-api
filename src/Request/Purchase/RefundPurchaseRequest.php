<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Request to refund a purchase
 *
 * @link https://digistore24.com/api/docs/paths/refundPurchase.yaml OpenAPI Specification
 */
final class RefundPurchaseRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The purchase ID
     * @param bool $force If false (default), refund only if policy allows. If true, attempt anyway.
     * @param string|null $requestDate Apply refund policies based on this date (default: 'now')
     */
    public function __construct(
        public string $purchaseId,
        public bool $force = false,
        public ?string $requestDate = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'purchase_id' => $this->purchaseId,
            'force' => $this->force,
        ];

        if ($this->requestDate !== null) {
            $data['request_date'] = $this->requestDate;
        }

        return $data;
    }

    public function endpoint(): string
    {
        return '/refundPurchase';
    }
}