<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Buyer;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Buyers Response
 *
 * Response object for the Buyer API endpoint.
 */
final class ListBuyersResponse extends AbstractResponse
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

    /** @return array<string, mixed> */
    public function getBuyerList(): array
    {
        $buyerList = $this->data['buyer_list'] ?? [];
        if (!is_array($buyerList)) {
            return [];
        }
        /** @var array<string, mixed> $validated */
        $validated = $buyerList;

        return $validated;
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
