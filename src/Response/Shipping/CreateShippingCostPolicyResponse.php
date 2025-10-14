<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Shipping;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class CreateShippingCostPolicyResponse extends AbstractResponse
{
    public function __construct(private string $result, private array $data) {}
    public function getResult(): string { return $this->result; }
    public function getData(): array { return $this->data; }
    public function getShippingCostPolicyId(): ?string { return $this->data['shipping_cost_policy_id'] ?? null; }
    public function wasSuccessful(): bool { return $this->result === 'success'; }
    public static function fromArray(array $data): self
    {
        return new self(
            result: (string) ($data['result'] ?? ''),
            data: $data['data'] ?? []
        );
    }
}
