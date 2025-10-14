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

    public function test_endpoint_returns_string(): void
    {
        $request = new ListCurrenciesRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListCurrenciesRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListCurrenciesRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

