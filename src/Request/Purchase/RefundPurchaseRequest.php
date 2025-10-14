<?php

declare(strict_types=1);

namespace Digistore24\Request\Purchase;

use Digistore24\Base\AbstractRequest;

/**
 * Request to refund a purchase
 *
 * @link https://digistore24.com/api/docs/paths/refundPurchase.yaml OpenAPI Specification
 */
final readonly class RefundPurchaseRequest extends AbstractRequest
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
        $params = [
            'purchase_id' => $this->purchaseId,
            'force' => $this->force,
        ];

        if ($this->requestDate !== null) {
            $params['request_date'] = $this->requestDate;
        }

        return $params;
    }

    public function validate(): void
    {
        // Purchase ID and force are validated by readonly types
    }
}
