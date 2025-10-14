<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ProductGroup;

use GoSuccess\Digistore24\Api\Request\ProductGroup\CreateProductGroupRequest;
use PHPUnit\Framework\TestCase;

final class CreateProductGroupRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateProductGroupRequest();
        $this->assertInstanceOf(CreateProductGroupRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new CreateProductGroupRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new CreateProductGroupRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new CreateProductGroupRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

