<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Invoice\ListInvoicesRequest;
use GoSuccess\Digistore24\Api\Request\Invoice\ResendInvoiceMailRequest;
use GoSuccess\Digistore24\Api\Response\Invoice\ListInvoicesResponse;
use GoSuccess\Digistore24\Api\Response\Invoice\ResendInvoiceMailResponse;

/**
 * Invoice Resource
 *
 * Provides methods to manage invoices and send invoice emails.
 */
final class InvoiceResource extends AbstractResource
{
    /**
     * List all invoices with optional filters.
     *
     * @param ListInvoicesRequest $request Request with optional filter criteria
     * @return ListInvoicesResponse Response with list of invoices
     */
    public function list(ListInvoicesRequest $request): ListInvoicesResponse
    {
        return $this->executeTyped($request, ListInvoicesResponse::class);
    }

    /**
     * Resend invoice email to customer.
     *
     * @param ResendInvoiceMailRequest $request Request containing invoice ID
     * @return ResendInvoiceMailResponse Response confirming email was sent
     */
    public function resendMail(ResendInvoiceMailRequest $request): ResendInvoiceMailResponse
    {
        return $this->executeTyped($request, ResendInvoiceMailResponse::class);
    }
}
