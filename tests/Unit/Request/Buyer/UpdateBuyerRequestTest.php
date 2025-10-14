<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Buyer;

use GoSuccess\Digistore24\Api\Request\Buyer\UpdateBuyerRequest;
use PHPUnit\Framework\TestCase;

final class UpdateBuyerRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateBuyerRequest();
        $this->assertInstanceOf(UpdateBuyerRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdateBuyerRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdateBuyerRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdateBuyerRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

