<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ProductGroup;

use GoSuccess\Digistore24\Api\Request\ProductGroup\UpdateProductGroupRequest;
use PHPUnit\Framework\TestCase;

final class UpdateProductGroupRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateProductGroupRequest();
        $this->assertInstanceOf(UpdateProductGroupRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdateProductGroupRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdateProductGroupRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdateProductGroupRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

