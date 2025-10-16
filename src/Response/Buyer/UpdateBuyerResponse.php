<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Buyer;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Update Buyer Response
 *
 * Response object for the Buyer API endpoint.
 */
final class UpdateBuyerResponse extends AbstractResponse
{
    /** @param array<string, mixed> $data */
    public function __construct(private string $result, private array $data)
    {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    /** @return array<string, mixed> */
    public function getData(): array
    {
        return $this->data;
    }

    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? [];
        if (!is_array($responseData)) {
            $responseData = [];
        }
        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        return new self(
            result: self::extractResult($data, $rawResponse),
            data: $validatedData,
        );
    }
}
