<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Payout;

use GoSuccess\Digistore24\Api\Request\Payout\ListPayoutsRequest;
use PHPUnit\Framework\TestCase;

final class ListPayoutsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListPayoutsRequest();

        $this->assertInstanceOf(ListPayoutsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListPayoutsRequest();

        $this->assertSame('/listPayouts', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListPayoutsRequest();

        $array = $request->toArray();        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListPayoutsRequest();

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
