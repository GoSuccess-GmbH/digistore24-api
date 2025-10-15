<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Invoice;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Invoices Request
 *
 * Retrieves all invoices for a specific purchase.
 */
final class ListInvoicesRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The purchase ID
     */
    public function __construct(
        private string $purchaseId
    ) {
    }

    public function getEndpoint(): string
    {
        return 'listInvoices';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        return ['purchase_id' => $this->purchaseId];
    }
}
