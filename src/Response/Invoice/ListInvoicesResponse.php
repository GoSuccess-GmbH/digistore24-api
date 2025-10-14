<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Invoice;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListInvoicesResponse extends AbstractResponse
{
    public function __construct(private string $purchaseId, private array $invoiceList) {}
    public function getPurchaseId(): string { return $this->purchaseId; }
    public function getInvoiceList(): array { return $this->invoiceList; }
    public static function fromArray(array $data): self
    {
        $invoiceData = $data['data'] ?? [];
        return new self(
            purchaseId: (string) ($invoiceData['purchase_id'] ?? ''),
            invoiceList: $invoiceData['invoice_list'] ?? []
        );
    }
}
