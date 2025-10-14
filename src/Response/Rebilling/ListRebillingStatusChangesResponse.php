<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Rebilling;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListRebillingStatusChangesResponse extends AbstractResponse
{
    public function __construct(private array $statusChanges) {}
    public function getStatusChanges(): array { return $this->statusChanges; }
    public static function fromArray(array $data): self
    {
        return new self(statusChanges: $data['data']['status_changes'] ?? []);
    }
}
