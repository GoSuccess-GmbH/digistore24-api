<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Country;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * @see https://digistore24.com/api/docs/paths/listCountries.yaml
 */
final class ListCountriesResponse extends AbstractResponse
{
    /**
     * @param array<string, string> $countries Country code => Country name
     */
    public function __construct(
        private array $countries,
    ) {
    }

    /**
     * @return array<string, string>
     */
    public function getCountries(): array
    {
        return $this->countries;
    }

    public function getCountryName(string $code): ?string
    {
        return $this->countries[$code] ?? null;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        /** @var array<string, string> $countries */
        $countries = [];
        foreach ($data as $code => $name) {
            if (is_string($name)) {
                $countries[(string)$code] = $name;
            }
        }

        return new self(countries: $countries);
    }
}
