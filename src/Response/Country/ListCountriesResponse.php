<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Response\Country;

use GoSuccess\Digistore24\Base\AbstractResponse;

/**
 * @see https://digistore24.com/api/docs/paths/listCountries.yaml
 */
final readonly class ListCountriesResponse extends AbstractResponse
{
    /**
     * @param array<string, string> $countries Country code => Country name
     */
    public function __construct(
        private array $countries,
    ) {}

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

    public static function fromArray(array $data): self
    {
        return new self(countries: $data);
    }
}
