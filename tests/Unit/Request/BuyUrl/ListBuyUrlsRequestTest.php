<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Request\BuyUrl\ListBuyUrlsRequest;
use PHPUnit\Framework\TestCase;

final class ListBuyUrlsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListBuyUrlsRequest();
        $this->assertInstanceOf(ListBuyUrlsRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ListBuyUrlsRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListBuyUrlsRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListBuyUrlsRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

