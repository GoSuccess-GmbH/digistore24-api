<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Customer To Affiliate Buyer Details Response
 *
 * Response object for the Purchase API endpoint.
 */
final class GetCustomerToAffiliateBuyerDetailsResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $details
     */
    public function __construct(private array $details)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $details = $data['data'] ?? [];
        if (! is_array($details)) {
            $details = [];
        }
        /** @var array<string, mixed> $validatedDetails */
        $validatedDetails = $details;

        return new self(details: $validatedDetails);
    }
}
