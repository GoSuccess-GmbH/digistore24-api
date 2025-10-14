<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Rebilling;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class CreateRebillingPaymentRequest extends AbstractRequest
{
    public function __construct(private string $purchaseId, private array $data = []) {}
    public function getEndpoint(): string { return 'createRebillingPayment'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['purchase_id' => $this->purchaseId], $this->data);
    }
}
