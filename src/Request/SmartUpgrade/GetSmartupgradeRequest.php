<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\SmartUpgrade;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetSmartupgradeRequest extends AbstractRequest
{
    public function __construct(private string $smartupgradeId, private ?string $purchaseId = null) {}
    public function getEndpoint(): string { return 'getSmartupgrade'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array
    {
        $params = ['smartupgrade_id' => $this->smartupgradeId];
        if ($this->purchaseId !== null) $params['purchase_id'] = $this->purchaseId;
        return $params;
    }
}
