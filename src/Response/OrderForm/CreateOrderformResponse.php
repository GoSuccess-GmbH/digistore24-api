<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\OrderForm;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class CreateOrderformResponse extends AbstractResponse
{
    public function __construct(private string $result, private array $data)
    {
    }
    public function getResult(): string
    {
        return $this->result;
    }
    public function getData(): array
    {
        return $this->data;
    }
    public function getOrderformId(): ?string
    {
        return $this->data['orderform_id'] ?? null;
    }
    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            result: (string) ($data['result'] ?? ''),
            data: $data['data'] ?? []
        );
    }
}
