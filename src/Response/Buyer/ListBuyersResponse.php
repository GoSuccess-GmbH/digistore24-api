<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Buyer;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListBuyersResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public function getBuyerList(): array { return $this->data['buyer_list'] ?? []; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
