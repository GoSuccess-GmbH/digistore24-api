<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Country\ListCountriesRequest;
use GoSuccess\Digistore24\Api\Response\Country\ListCountriesResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('country')]
final class CountryIntegrationTest extends IntegrationTestCase
{
    private Digistore24 $client;

    protected function setUp(): void
    {
        parent::setUp();

        $apiKey = $this->getApiKey();
        $config = new Configuration(apiKey: $apiKey);
        $this->client = new Digistore24($config);
    }

    /**
     * Test listing countries
     *
     * @return void
     */
    public function testListCountries(): void
    {
        $response = $this->client->countries->listCountries(new ListCountriesRequest());

        $this->assertInstanceOf(ListCountriesResponse::class, $response);

        $countries = $response->getCountries();
        $this->assertNotEmpty($countries);

        // Check that Germany exists
        $this->assertArrayHasKey('DE', $countries);
        $this->assertNotEmpty($response->getCountryName('DE'));
    }
}
