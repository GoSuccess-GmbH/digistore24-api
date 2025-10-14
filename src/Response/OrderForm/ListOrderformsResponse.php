<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\OrderForm;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListOrderformsResponse extends AbstractResponse
{
    public function __construct(private array $orderforms) {}
    public function getOrderforms(): array { return $this->orderforms; }
    public static function fromArray(array $data): self
    {
        return new self(orderforms: $data['data']['orderforms'] ?? []);
    }
}
