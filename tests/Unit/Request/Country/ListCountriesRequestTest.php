<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Country;

use GoSuccess\Digistore24\Api\Request\Country\ListCountriesRequest;
use PHPUnit\Framework\TestCase;

final class ListCountriesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListCountriesRequest();

        $this->assertInstanceOf(ListCountriesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListCountriesRequest();

        $this->assertSame('/listCountries', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListCountriesRequest();

        $array = $request->toArray();
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListCountriesRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
