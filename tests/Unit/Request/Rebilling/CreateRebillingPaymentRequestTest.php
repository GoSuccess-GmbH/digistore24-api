<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Rebilling;

use GoSuccess\Digistore24\Api\Request\Rebilling\CreateRebillingPaymentRequest;
use PHPUnit\Framework\TestCase;

final class CreateRebillingPaymentRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateRebillingPaymentRequest();
        $this->assertInstanceOf(CreateRebillingPaymentRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreateRebillingPaymentRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreateRebillingPaymentRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreateRebillingPaymentRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

