<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Upgrade;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListUpgradesResponse extends AbstractResponse
{
    public function __construct(private array $upgrades) {}
    public function getUpgrades(): array { return $this->upgrades; }
    public static function fromArray(array $data): self
    {
        return new self(upgrades: $data['data']['upgrades'] ?? []);
    }
}
