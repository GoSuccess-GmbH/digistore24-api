<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Transaction;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class ListTransactionsResponse extends AbstractResponse
{
    public function __construct(private array $data) {}
    public function getData(): array { return $this->data; }
    public function getTransactionList(): array { return $this->data['transaction_list'] ?? []; }
    public static function fromArray(array $data): self
    {
        return new self(data: $data['data'] ?? []);
    }
}
