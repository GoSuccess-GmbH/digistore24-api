<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Billing;

use GoSuccess\Digistore24\Api\Request\Billing\CreateBillingOnDemandRequest;
use PHPUnit\Framework\TestCase;

final class CreateBillingOnDemandRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateBillingOnDemandRequest();
        $this->assertInstanceOf(CreateBillingOnDemandRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreateBillingOnDemandRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreateBillingOnDemandRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreateBillingOnDemandRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

