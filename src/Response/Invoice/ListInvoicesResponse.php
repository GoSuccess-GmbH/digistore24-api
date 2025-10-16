<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Invoice;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Invoices Response
 *
 * Response object for the Invoice API endpoint.
 */
final class ListInvoicesResponse extends AbstractResponse
{
    /** @param array<string, mixed> $invoiceList */
    public function __construct(private string $purchaseId, private array $invoiceList)
    {
    }

    public function getPurchaseId(): string
    {
        return $this->purchaseId;
    }

    /** @return array<string, mixed> */
    public function getInvoiceList(): array
    {
        return $this->invoiceList;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $invoiceData = $data['data'] ?? [];
        if (!is_array($invoiceData)) {
            $invoiceData = [];
        }

        $purchaseId = $invoiceData['purchase_id'] ?? '';
        $invoiceList = $invoiceData['invoice_list'] ?? [];
        if (!is_array($invoiceList)) {
            $invoiceList = [];
        }
        /** @var array<string, mixed> $validatedInvoiceList */
        $validatedInvoiceList = $invoiceList;

        return new self(
            purchaseId: is_string($purchaseId) ? $purchaseId : '',
            invoiceList: $validatedInvoiceList,
        );
    }
}
