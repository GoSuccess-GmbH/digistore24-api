<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Request\PaymentPlan\CreatePaymentplanRequest;
use PHPUnit\Framework\TestCase;

final class CreatePaymentplanRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreatePaymentplanRequest(data: ['name' => 'Test Plan']);
        
        $this->assertInstanceOf(CreatePaymentplanRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreatePaymentplanRequest(data: ['name' => 'Test Plan']);
        
        $this->assertSame('createPaymentplan', $request->getEndpoint());
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreatePaymentplanRequest(data: ['name' => 'Test Plan']);
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

