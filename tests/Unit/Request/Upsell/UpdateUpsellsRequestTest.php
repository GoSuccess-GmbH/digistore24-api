<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Upsell;

use GoSuccess\Digistore24\Api\Request\Upsell\UpdateUpsellsRequest;
use PHPUnit\Framework\TestCase;

final class UpdateUpsellsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateUpsellsRequest();
        $this->assertInstanceOf(UpdateUpsellsRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdateUpsellsRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdateUpsellsRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdateUpsellsRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

