<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Payout;

use GoSuccess\Digistore24\Api\Request\Payout\StatsExpectedPayoutsRequest;
use PHPUnit\Framework\TestCase;

final class StatsExpectedPayoutsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new StatsExpectedPayoutsRequest();
        
        $this->assertInstanceOf(StatsExpectedPayoutsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new StatsExpectedPayoutsRequest();
        
        $this->assertSame('statsExpectedPayouts', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new StatsExpectedPayoutsRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new StatsExpectedPayoutsRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

