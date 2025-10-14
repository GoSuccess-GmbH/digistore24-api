<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\ConversionTool;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class ListConversionToolsResponse extends AbstractResponse
{
    public function __construct(private array $smartupgrades)
    {
    }
    public function getSmartupgrades(): array
    {
        return $this->smartupgrades;
    }
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(smartupgrades: $data['smartupgrades'] ?? []);
    }
}
