<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Statistics;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class StatsAffiliateToplistResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public function getToplist(): array { return $this->data['toplist'] ?? []; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
