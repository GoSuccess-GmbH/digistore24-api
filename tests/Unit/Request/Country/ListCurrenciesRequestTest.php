<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Country;

use GoSuccess\Digistore24\Api\Request\Country\ListCurrenciesRequest;
use PHPUnit\Framework\TestCase;

final class ListCurrenciesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListCurrenciesRequest();

        $this->assertInstanceOf(ListCurrenciesRequest::class, $request);
    }

    public function test_can_create_instance_with_convert_to(): void
    {
        $request = new ListCurrenciesRequest(convertTo: 'EUR');

        $this->assertInstanceOf(ListCurrenciesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListCurrenciesRequest();

        $this->assertSame('/listCurrencies', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array_without_convert_to(): void
    {
        $request = new ListCurrenciesRequest();

        $array = $request->toArray();
        $this->assertEmpty($array);
    }

    public function test_to_array_includes_convert_to_when_set(): void
    {
        $request = new ListCurrenciesRequest(convertTo: 'EUR');

        $array = $request->toArray();
        $this->assertSame('EUR', $array['convert_to']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListCurrenciesRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
