<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Buyer;

use GoSuccess\Digistore24\Api\Request\Buyer\ListBuyersRequest;
use PHPUnit\Framework\TestCase;

final class ListBuyersRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListBuyersRequest();
        $this->assertInstanceOf(ListBuyersRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ListBuyersRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListBuyersRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListBuyersRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

