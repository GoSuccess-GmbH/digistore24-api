<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\OrderForm;

use GoSuccess\Digistore24\Api\Request\OrderForm\GetOrderformMetasRequest;
use PHPUnit\Framework\TestCase;

final class GetOrderformMetasRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetOrderformMetasRequest();
        $this->assertInstanceOf(GetOrderformMetasRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetOrderformMetasRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetOrderformMetasRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetOrderformMetasRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

