<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Upgrade;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetUpgradeRequest extends AbstractRequest
{
    public function __construct(private string $upgradeId) {}
    public function getEndpoint(): string { return 'getUpgrade'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['upgrade_id' => $this->upgradeId]; }
}
