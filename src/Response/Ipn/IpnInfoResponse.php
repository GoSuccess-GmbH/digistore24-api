<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Ipn;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class IpnInfoResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public function getUrl(): ?string { return $this->data['url'] ?? null; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
