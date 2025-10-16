<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Buyer;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Buyer Response
 *
 * Response object for the Buyer API endpoint.
 */
final class GetBuyerResponse extends AbstractResponse
{
    /** @param array<string, mixed> $data */
    public function __construct(private array $data)
    {
    }

    /** @return array<string, mixed> */
    public function getData(): array
    {
        return $this->data;
    }

    public function getBuyerId(): ?string
    {
        $value = $this->data['buyer_id'] ?? null;

        return is_string($value) ? $value : null;
    }

    public function getEmail(): ?string
    {
        $value = $this->data['email'] ?? null;

        return is_string($value) ? $value : null;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? [];
        if (!is_array($responseData)) {
            $responseData = [];
        }
        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        return new self(data: $validatedData);
    }
}
