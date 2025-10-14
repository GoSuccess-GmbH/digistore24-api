<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Get Customer To Affiliate Buyer Details Response
 *
 * Response object for the Purchase API endpoint.
 */
final class GetCustomerToAffiliateBuyerDetailsResponse extends AbstractResponse
{
    public function __construct(private array $details)
    {
    }

    public function getDetails(): array
    {
        return $this->details;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(details: $data['data'] ?? []);
    }
}
