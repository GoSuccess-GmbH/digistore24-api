<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\GetPurchaseDownloadsRequest;
use PHPUnit\Framework\TestCase;

final class GetPurchaseDownloadsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetPurchaseDownloadsRequest();
        $this->assertInstanceOf(GetPurchaseDownloadsRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetPurchaseDownloadsRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetPurchaseDownloadsRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetPurchaseDownloadsRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

