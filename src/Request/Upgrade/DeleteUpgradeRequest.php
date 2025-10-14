<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Upgrade;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class DeleteUpgradeRequest extends AbstractRequest
{
    public function __construct(private string $upgradeId) {}
    public function getEndpoint(): string { return 'deleteUpgrade'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array { return ['upgrade_id' => $this->upgradeId]; }
}
