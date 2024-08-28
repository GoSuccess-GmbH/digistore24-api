<?php

namespace GoSuccess\Digistore24\Controllers;
use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Country\Country;

class CountryController extends Controller
{
    /**
     * Get all countries Digistore24 accepts.
     * @link https://dev.digistore24.com/en/articles/67-listcountries
     * @return Country[]|null
     */
    public function list(): ?array
    {
        $data = $this->api->call(
            'listCountries'
        );
        
        if( ! $data )
        {
            return null;
        }

        return array_map(
            function( $country_code, $country_name )
            {
                $country = new Country();
                $country->code = $country_code;
                $country->name = $country_name;

                return $country;
            },
            array_keys( (array) $data ),
            (array) $data
        );
    }
}
