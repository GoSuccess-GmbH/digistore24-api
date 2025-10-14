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
 */
final class CountryResource extends AbstractResource
{
    /**
     * @link https://digistore24.com/api/docs/paths/listCountries.yaml
     */
    public function listCountries(ListCountriesRequest $request): ListCountriesResponse
    {
        return $this->executeTyped($request, ListCountriesResponse::class);
    }

    /**
     * @link https://digistore24.com/api/docs/paths/listCurrencies.yaml
     */
    public function listCurrencies(ListCurrenciesRequest $request): ListCurrenciesResponse
    {
        return $this->executeTyped($request, ListCurrenciesResponse::class);
    }
}
