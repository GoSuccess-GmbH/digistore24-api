<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;

/**
 * Country Resource
 * 
 * Retrieve country and region information.
 * 
 * @link https://digistore24.com/api/docs/tags/country
 */
final class CountryResource extends AbstractResource
{
    /**
     * List all available countries
     * 
     * TODO: Implement when listCountries endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/listCountries.yaml
     * 
     * @example
     * ```php
     * $request = new ListCountriesRequest();
     * $countries = $client->countries->list($request);
     * foreach ($countries->items as $country) {
     *     echo "{$country->code}: {$country->name}\n";
     * }
     * ```
     */
    // public function list(ListCountriesRequest $request): ListCountriesResponse
    // {
    //     return $this->executeTyped($request, ListCountriesResponse::class);
    // }
}
