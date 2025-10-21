<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Country\ListCountriesRequest;
use GoSuccess\Digistore24\Api\Request\Country\ListCurrenciesRequest;
use GoSuccess\Digistore24\Api\Response\Country\ListCountriesResponse;
use GoSuccess\Digistore24\Api\Response\Country\ListCurrenciesResponse;

/**
 * Country & Currency Resource
 *
 * Provides methods to retrieve available countries and currencies.
 */
final class CountryResource extends AbstractResource
{
    /**
     * List all available countries.
     *
     * @param ListCountriesRequest|null $request Optional request to list countries
     * @return ListCountriesResponse Response with list of countries
     * @link https://digistore24.com/api/docs/paths/listCountries.yaml
     */
    public function listCountries(?ListCountriesRequest $request = null): ListCountriesResponse
    {
        return $this->executeTyped($request ?? new ListCountriesRequest(), ListCountriesResponse::class);
    }

    /**
     * List all available currencies.
     *
     * @param ListCurrenciesRequest|null $request Optional request to list currencies
     * @return ListCurrenciesResponse Response with list of currencies
     * @link https://digistore24.com/api/docs/paths/listCurrencies.yaml
     */
    public function listCurrencies(?ListCurrenciesRequest $request = null): ListCurrenciesResponse
    {
        return $this->executeTyped($request ?? new ListCurrenciesRequest(), ListCurrenciesResponse::class);
    }
}
