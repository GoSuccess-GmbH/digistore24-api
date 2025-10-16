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

    public function wasSuccessful(): bool
    {
        return strtolower($this->result) === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            result: self::extractResult($data, $rawResponse),
            data: $data['data'] ?? [],
        );
    }
}
