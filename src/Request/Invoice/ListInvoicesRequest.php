<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Invoice;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class ListInvoicesRequest extends AbstractRequest
{
    public function __construct(private string $purchaseId) {}
    public function endpoint(): string { return 'listInvoices'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['purchase_id' => $this->purchaseId]; }
}
