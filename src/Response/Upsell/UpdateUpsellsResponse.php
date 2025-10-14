<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Upsell;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class UpdateUpsellsResponse extends AbstractResponse
{
    public function __construct(private string $result) {}
    public function getResult(): string { return $this->result; }
    public function wasSuccessful(): bool { return $this->result === 'success'; }
    public static function fromArray(array $data): self
    {
        return new self(result: (string) ($data['result'] ?? ''));
    }
}
