<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Statistics;

use GoSuccess\Digistore24\Api\Request\Statistics\StatsSalesSummaryRequest;
use PHPUnit\Framework\TestCase;

final class StatsSalesSummaryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new StatsSalesSummaryRequest();
        $this->assertInstanceOf(StatsSalesSummaryRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new StatsSalesSummaryRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new StatsSalesSummaryRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new StatsSalesSummaryRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

