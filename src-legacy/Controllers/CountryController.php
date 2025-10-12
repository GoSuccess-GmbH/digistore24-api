<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Country\Country;

class CountryController extends Controller
{
    /**
     * Get all countries Digistore24 accepts
     * @link https://dev.digistore24.com/en/articles/67-listcountries
     * @return array<Country>|null
     */
    public function list(): ?array
    {
        $data = $this->api->call('listCountries');
        
        if (!$data) {
            return null;
        }

        return array_map(
            function(string $countryCode, string $countryName): Country {
                $country = new Country();
                $country->code = $countryCode;
                $country->name = $countryName;
                return $country;
            },
            array_keys((array) $data),
            (array) $data
        );
    }
}
