<?php

declare(strict_types=1);

namespace Digistore24\Request\Purchase;

use Digistore24\Base\AbstractRequest;

/**
 * Request to update a purchase
 *
 * @link https://digistore24.com/api/docs/paths/updatePurchase.yaml OpenAPI Specification
 */
final readonly class UpdatePurchaseRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The ID of the purchase to update
     * @param string|null $trackingParam The vendor's tracking key
     * @param string|null $custom The custom field
     * @param bool|null $unlockInvoices Grant buyer access to order details and invoices
     * @param string|null $nextPaymentAt Extend rebilling payment interval (date-time format)
     */
    public function __construct(
        public string $purchaseId,
        public ?string $trackingParam = null,
        public ?string $custom = null,
        public ?bool $unlockInvoices = null,
        public ?string $nextPaymentAt = null,
    ) {
    }

    public function toArray(): array
    {
        $params = [
            'purchase_id' => $this->purchaseId,
        ];

        $data = [];

        if ($this->trackingParam !== null) {
            $data['tracking_param'] = $this->trackingParam;
        }
        if ($this->custom !== null) {
            $data['custom'] = $this->custom;
        }
        if ($this->unlockInvoices !== null) {
            $data['unlock_invoices'] = $this->unlockInvoices;
        }
        if ($this->nextPaymentAt !== null) {
            $data['next_payment_at'] = $this->nextPaymentAt;
        }

        // Only add data if there's something to update
        if (!empty($data)) {
            $params = array_merge($params, $data);
        }

        return $params;
    }

    public function validate(): void
    {
        // Purchase ID is validated by readonly string type
    }
}
