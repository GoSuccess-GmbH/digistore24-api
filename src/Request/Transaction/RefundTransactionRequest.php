<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Transaction;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class RefundTransactionRequest extends AbstractRequest
{
    public function __construct(
        private string $transactionId,
        private ?bool $force = null,
        private ?string $requestDate = null,
    ) {}
    public function getEndpoint(): string { return 'refundTransaction'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        $params = ['transaction_id' => $this->transactionId];
        if ($this->force !== null) $params['force'] = $this->force;
        if ($this->requestDate !== null) $params['request_date'] = $this->requestDate;
        return $params;
    }
}
