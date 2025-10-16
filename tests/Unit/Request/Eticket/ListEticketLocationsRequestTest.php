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

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListEticketLocationsRequest();

        $this->assertSame('/listEticketLocations', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListEticketLocationsRequest();

        $array = $request->toArray();        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListEticketLocationsRequest();

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
