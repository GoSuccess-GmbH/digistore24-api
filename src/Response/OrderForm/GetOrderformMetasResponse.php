<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\OrderForm;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class GetOrderformMetasResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public function getMetas(): array { return $this->data; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
