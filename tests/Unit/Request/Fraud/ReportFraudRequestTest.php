<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Fraud;

use GoSuccess\Digistore24\Api\Request\Fraud\ReportFraudRequest;
use PHPUnit\Framework\TestCase;

final class ReportFraudRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ReportFraudRequest();
        $this->assertInstanceOf(ReportFraudRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ReportFraudRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ReportFraudRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ReportFraudRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

