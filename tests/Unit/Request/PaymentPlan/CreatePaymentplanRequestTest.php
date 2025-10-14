<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Request\PaymentPlan\CreatePaymentplanRequest;
use PHPUnit\Framework\TestCase;

final class CreatePaymentplanRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreatePaymentplanRequest();
        $this->assertInstanceOf(CreatePaymentplanRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreatePaymentplanRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreatePaymentplanRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreatePaymentplanRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

