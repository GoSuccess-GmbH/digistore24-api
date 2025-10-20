<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Country;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Countries Response
 *
 * Contains a map of country codes to country names.
 */
final class ListCountriesResponse extends AbstractResponse
{
    /**
     * Country code => Country name map
     *
     * @var array<string, string>
     */
    public array $countries = [] {
        get => $this->countries;
    }

    /**
     * @param array<string, string> $countries
     */
    public function __construct(array $countries = [])
    {
        $this->countries = $countries;
    }

    /**
     * Get country name by code
     */
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

        $instance = new self(countries: $countries);

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
