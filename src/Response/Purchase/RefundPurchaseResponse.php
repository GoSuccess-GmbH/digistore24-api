<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Refund Purchase Response
 *
 * Response object for the Purchase API endpoint.
 */
final class RefundPurchaseResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(private string $result, private array $data)
    {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function wasSuccessful(): bool
    {
        return strtolower($this->result) === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $refundData = $data['data'] ?? [];
        if (!is_array($refundData)) {
            $refundData = [];
        }
        /** @var array<string, mixed> $validatedData */
        $validatedData = $refundData;

        return new self(
            result: self::extractResult($data, $rawResponse),
            data: $validatedData,
        );
    }
}
