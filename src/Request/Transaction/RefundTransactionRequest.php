<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Transaction;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class RefundTransactionRequest extends AbstractRequest
{
    public function __construct(
        private string $transactionId,
        private ?bool $force = null,
        private ?string $requestDate = null,
    ) {}
    public function getEndpoint(): string { return 'refundTransaction'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        $params = ['transaction_id' => $this->transactionId];
        if ($this->force !== null) $params['force'] = $this->force;
        if ($this->requestDate !== null) $params['request_date'] = $this->requestDate;
        return $params;
    }
}
