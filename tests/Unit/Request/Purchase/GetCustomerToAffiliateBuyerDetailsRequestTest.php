<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\GetCustomerToAffiliateBuyerDetailsRequest;
use PHPUnit\Framework\TestCase;

final class GetCustomerToAffiliateBuyerDetailsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetCustomerToAffiliateBuyerDetailsRequest();
        $this->assertInstanceOf(GetCustomerToAffiliateBuyerDetailsRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetCustomerToAffiliateBuyerDetailsRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetCustomerToAffiliateBuyerDetailsRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetCustomerToAffiliateBuyerDetailsRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

