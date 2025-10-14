<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * Response from refunding a purchase
 *
 * @link https://digistore24.com/api/docs/paths/refundPurchase.yaml OpenAPI Specification
 */
final readonly class RefundPurchaseResponse extends AbstractResponse
{
    public string $result;
    public array $data;

    protected function parse(array $data): void
    {
        $this->result = $data['result'];
        $this->data = $data['data'] ?? [];
    }

    /**
     * Check if the refund was successful
     */
    public function wasSuccessful(): bool
    {
        return strtolower($this->result) === 'success';
    }
}
