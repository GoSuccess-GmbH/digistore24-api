<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Delivery;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class ListDeliveriesRequest extends AbstractRequest
{
    public function __construct(private ?string $purchaseId = null) {}
    public function getEndpoint(): string { return 'listDeliveries'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array
    {
        $params = [];
        if ($this->purchaseId !== null) $params['purchase_id'] = $this->purchaseId;
        return $params;
    }
}
