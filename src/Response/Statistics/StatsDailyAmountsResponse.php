<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Statistics;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class StatsDailyAmountsResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public function getDailyAmounts(): array { return $this->data['daily_amounts'] ?? []; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
