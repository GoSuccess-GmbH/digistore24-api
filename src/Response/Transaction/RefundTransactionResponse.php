<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Transaction;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Refund Transaction Response
 *
 * Response object for the Transaction API endpoint.
 */
final class RefundTransactionResponse extends AbstractResponse
{
    public function __construct(private string $status, private string $modified, private array $data)
    {
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getModified(): string
    {
        return $this->modified;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function wasSuccessful(): bool
    {
        return $this->status === 'completed';
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        $refundData = $data['data'] ?? [];
        return new self(
            status: (string) ($refundData['status'] ?? ''),
            modified: (string) ($refundData['modified'] ?? 'N'),
            data: $refundData
        );
    }
}