<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Buyer;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\DTO\BuyerData;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Buyer Response
 *
 * Response object for the Buyer API endpoint.
 */
final class GetBuyerResponse extends AbstractResponse
{
    /**
     * Buyer data
     */
    public BuyerData $buyer {
        get => $this->buyer;
    }

    /**
     * @param BuyerData $buyer
     */
    public function __construct(BuyerData $buyer)
    {
        $this->buyer = $buyer;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);

        $buyerData = $innerData['buyer'] ?? [];

        if (! is_array($buyerData)) {
            $buyerData = [];
        }

        /** @var array<string, mixed> $validBuyerData */
        $validBuyerData = $buyerData;

        return new self(
            buyer: BuyerData::fromArray($validBuyerData),
        );
    }
}
