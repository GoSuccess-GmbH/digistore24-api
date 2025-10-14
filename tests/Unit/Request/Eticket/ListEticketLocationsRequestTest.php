<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Eticket;

use GoSuccess\Digistore24\Api\Request\Eticket\ListEticketLocationsRequest;
use PHPUnit\Framework\TestCase;

final class ListEticketLocationsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListEticketLocationsRequest();
        $this->assertInstanceOf(ListEticketLocationsRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ListEticketLocationsRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListEticketLocationsRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListEticketLocationsRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

