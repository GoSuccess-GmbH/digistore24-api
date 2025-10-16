<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Billing;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Response from partially refunding a purchase.
 *
 * Contains the result of the partial refund operation.
 * The order status does not change with partial refunds.
 *
 * @see https://digistore24.com/api/docs/paths/refundPartially.yaml
 */
final class RefundPartiallyResponse extends AbstractResponse
{
    /**
     * @param string $result Result status of the refund
     * @param array<string, mixed> $data Additional response data
     */
    public function __construct(
        private string $result,
        private array $data,
    ) {
    }

    /**
     * Get the result status.
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * Get additional response data.
     *
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Check if the partial refund was successful.
     */
    public function wasSuccessful(): bool
    {
        return strtolower($this->result) === 'success'
            || strtolower($this->result) === 'ok';
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $result = $data['result'] ?? 'unknown';
        $responseData = $data['data'] ?? [];
        
        if (!is_array($responseData)) {
            $responseData = [];
        }
        
        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;
        
        return new self(
            result: is_string($result) ? $result : 'unknown',
            data: $validatedData,
        );
    }
}
