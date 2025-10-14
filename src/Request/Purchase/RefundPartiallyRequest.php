<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Purchase;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class RefundPartiallyRequest extends AbstractRequest
{
    public function __construct(private string $purchaseId, private float $amount, private string $reason = '') {}
    public function endpoint(): string { return 'refundPartially'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        $params = ['purchase_id' => $this->purchaseId, 'amount' => $this->amount];
        if ($this->reason !== '') $params['reason'] = $this->reason;
        return $params;
    }
}
