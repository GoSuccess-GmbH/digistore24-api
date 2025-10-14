<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\SmartUpgrade;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class GetSmartupgradeRequest extends AbstractRequest
{
    public function __construct(private string $smartupgradeId, private ?string $purchaseId = null) {}
    public function getEndpoint(): string { return 'getSmartupgrade'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array
    {
        $params = ['smartupgrade_id' => $this->smartupgradeId];
        if ($this->purchaseId !== null) $params['purchase_id'] = $this->purchaseId;
        return $params;
    }
}
