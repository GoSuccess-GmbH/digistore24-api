<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Upsell;

use GoSuccess\Digistore24\Api\Request\Upsell\GetUpsellsRequest;
use PHPUnit\Framework\TestCase;

final class GetUpsellsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetUpsellsRequest();
        $this->assertInstanceOf(GetUpsellsRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetUpsellsRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetUpsellsRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetUpsellsRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

