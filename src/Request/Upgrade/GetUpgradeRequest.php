<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Upgrade;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class GetUpgradeRequest extends AbstractRequest
{
    public function __construct(private string $upgradeId) {}
    public function getEndpoint(): string { return 'getUpgrade'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['upgrade_id' => $this->upgradeId]; }
}
