<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Marketplace;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListMarketplaceEntriesResponse extends AbstractResponse
{
    public function __construct(private array $entries) {}
    public function getEntries(): array { return $this->entries; }
    public static function fromArray(array $data): self
    {
        return new self(entries: $data['data']['entries'] ?? []);
    }
}
