<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Transaction;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Refund Transaction Response
 *
 * Response object for the Transaction API endpoint.
 */
final class RefundTransactionResponse extends AbstractResponse
{
    /** @param array<string, mixed> $data */
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

    /** @return array<string, mixed> */
    public function getData(): array
    {
        return $this->data;
    }

    public function wasSuccessful(): bool
    {
        return $this->status === 'completed';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $refundData = $data['data'] ?? [];
        if (! is_array($refundData)) {
            $refundData = [];
        }

        $status = $refundData['status'] ?? '';
        $modified = $refundData['modified'] ?? 'N';
        /** @var array<string, mixed> $validatedData */
        $validatedData = $refundData;

        return new self(
            status: is_string($status) ? $status : '',
            modified: is_string($modified) ? $modified : 'N',
            data: $validatedData,
        );
    }
}
