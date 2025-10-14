<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Purchase;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class RefundPartiallyRequest extends AbstractRequest
{
    public function __construct(private string $purchaseId, private float $amount, private string $reason = '') {}
    public function getEndpoint(): string { return 'refundPartially'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        $params = ['purchase_id' => $this->purchaseId, 'amount' => $this->amount];
        if ($this->reason !== '') $params['reason'] = $this->reason;
        return $params;
    }
}
