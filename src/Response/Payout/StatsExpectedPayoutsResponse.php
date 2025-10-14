<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Payout;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class StatsExpectedPayoutsResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
