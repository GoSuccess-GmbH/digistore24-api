<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Invoice;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Resend Invoice Mail Request
 *
 * Resends the invoice email to the customer.
 */
final class ResendInvoiceMailRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The purchase ID
     */
    public function __construct(
        private string $purchaseId,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/resendInvoiceMail';
    }

    public function method(): Method
    {
        return Method::POST;
    }

    public function toArray(): array
    {
        return ['purchase_id' => $this->purchaseId];
    }
}
