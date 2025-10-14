<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Rebilling;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class StopRebillingRequest extends AbstractRequest
{
    public function __construct(private string $purchaseId) {}
    public function getEndpoint(): string { return 'stopRebilling'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array { return ['purchase_id' => $this->purchaseId]; }
}
