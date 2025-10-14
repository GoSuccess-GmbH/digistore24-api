<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Upgrade;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class DeleteUpgradeRequest extends AbstractRequest
{
    public function __construct(private string $upgradeId) {}
    public function endpoint(): string { return 'deleteUpgrade'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return ['upgrade_id' => $this->upgradeId]; }
}
