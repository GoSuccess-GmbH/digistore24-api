<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Voucher;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class GetVoucherResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public function getCode(): ?string { return $this->data['code'] ?? null; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
