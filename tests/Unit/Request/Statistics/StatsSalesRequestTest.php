<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Statistics;

use GoSuccess\Digistore24\Api\Request\Statistics\StatsSalesRequest;
use PHPUnit\Framework\TestCase;

final class StatsSalesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new StatsSalesRequest();
        $this->assertInstanceOf(StatsSalesRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new StatsSalesRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new StatsSalesRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new StatsSalesRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

