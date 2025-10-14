<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Request\BuyUrl\DeleteBuyUrlRequest;
use PHPUnit\Framework\TestCase;

final class DeleteBuyUrlRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeleteBuyUrlRequest();
        $this->assertInstanceOf(DeleteBuyUrlRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new DeleteBuyUrlRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new DeleteBuyUrlRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new DeleteBuyUrlRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

