<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\ConversionTool;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListConversionToolsResponse extends AbstractResponse
{
    public function __construct(private array $smartupgrades) {}
    public function getSmartupgrades(): array { return $this->smartupgrades; }
    public static function fromArray(array $data): self
    {
        return new self(smartupgrades: $data['smartupgrades'] ?? []);
    }
}
