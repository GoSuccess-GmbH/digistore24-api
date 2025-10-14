<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Commission;

use GoSuccess\Digistore24\Api\Request\Commission\ListCommissionsRequest;
use PHPUnit\Framework\TestCase;

final class ListCommissionsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListCommissionsRequest();
        $this->assertInstanceOf(ListCommissionsRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ListCommissionsRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListCommissionsRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListCommissionsRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

