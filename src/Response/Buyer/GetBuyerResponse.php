<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Buyer;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class GetBuyerResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public function getBuyerId(): ?string { return $this->data['buyer_id'] ?? null; }
    public function getEmail(): ?string { return $this->data['email'] ?? null; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
