<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ProductGroup;

use GoSuccess\Digistore24\Api\Request\ProductGroup\CreateProductGroupRequest;
use PHPUnit\Framework\TestCase;

final class CreateProductGroupRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateProductGroupRequest(data: ['name' => 'Test Group']);
        
        $this->assertInstanceOf(CreateProductGroupRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateProductGroupRequest(data: ['name' => 'Test Group']);
        
        $this->assertSame('createProductGroup', $request->getEndpoint());
    }

    public function test_to_array_includes_data(): void
    {
        $request = new CreateProductGroupRequest(data: ['name' => 'Test Group', 'description' => 'Group Description']);
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('Test Group', $array['name']);
        $this->assertSame('Group Description', $array['description']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreateProductGroupRequest(data: ['name' => 'Test Group']);
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

