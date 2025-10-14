<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
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

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            locationId: $data['location_id'] ?? '',
            locationName: $data['location_name'] ?? '',
            address: $data['address'] ?? null,
            city: $data['city'] ?? null,
            country: $data['country'] ?? null,
        );
    }
}

/**
 * List E-Ticket Locations Response
 *
 * Response containing a list of e-ticket locations.
 */
final class ListEticketLocationsResponse extends AbstractResponse
{
    /**
     * @param array<EticketLocation> $locations Array of e-ticket locations
     */
    public function __construct(
        public readonly array $locations,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $locations = [];

        if (isset($data['locations']) && is_array($data['locations'])) {
            foreach ($data['locations'] as $location) {
                $locations[] = EticketLocation::fromArray($location);
            }
        }

        $instance = new self(locations: $locations);
        
        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }
        
        return $instance;
    }
}
