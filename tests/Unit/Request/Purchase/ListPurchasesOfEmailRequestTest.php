<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\ListPurchasesOfEmailRequest;
use PHPUnit\Framework\TestCase;

final class ListPurchasesOfEmailRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListPurchasesOfEmailRequest();
        $this->assertInstanceOf(ListPurchasesOfEmailRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ListPurchasesOfEmailRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListPurchasesOfEmailRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListPurchasesOfEmailRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

