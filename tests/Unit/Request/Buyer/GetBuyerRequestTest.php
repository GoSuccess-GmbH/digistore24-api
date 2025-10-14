<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Buyer;

use GoSuccess\Digistore24\Api\Request\Buyer\GetBuyerRequest;
use PHPUnit\Framework\TestCase;

final class GetBuyerRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetBuyerRequest();
        $this->assertInstanceOf(GetBuyerRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetBuyerRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetBuyerRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetBuyerRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

