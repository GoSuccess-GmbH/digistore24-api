<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\SmartUpgrade;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class ListSmartUpgradesResponse extends AbstractResponse
{
    public function __construct(private array $smartupgrades) {}
    public function getSmartupgrades(): array { return $this->smartupgrades; }
    public static function fromArray(array $data): self
    {
        return new self(smartupgrades: $data['smartupgrades'] ?? []);
    }
}
