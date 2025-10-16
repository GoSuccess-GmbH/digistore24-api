<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Http\Response;

/**
 * E-Ticket Location
 *
 * Represents an e-ticket location.
 */
final class EticketLocation
{
    public function __construct(
        public readonly string $locationId,
        public readonly string $locationName,
        public readonly ?string $address,
        public readonly ?string $city,
        public readonly ?string $country,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $locationId = $data['location_id'] ?? '';
        $locationName = $data['location_name'] ?? '';
        $address = $data['address'] ?? null;
        $city = $data['city'] ?? null;
        $country = $data['country'] ?? null;

        return new self(
            locationId: is_string($locationId) ? $locationId : '',
            locationName: is_string($locationName) ? $locationName : '',
            address: $address !== null && is_string($address) ? $address : null,
            city: $city !== null && is_string($city) ? $city : null,
            country: $country !== null && is_string($country) ? $country : null,
        );
    }
}
