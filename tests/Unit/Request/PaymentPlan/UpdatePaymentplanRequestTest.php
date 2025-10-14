<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Request\PaymentPlan\UpdatePaymentplanRequest;
use PHPUnit\Framework\TestCase;

final class UpdatePaymentplanRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdatePaymentplanRequest();
        $this->assertInstanceOf(UpdatePaymentplanRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdatePaymentplanRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdatePaymentplanRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdatePaymentplanRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

