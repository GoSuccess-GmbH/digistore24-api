<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ProductGroup;

use GoSuccess\Digistore24\Api\DataTransferObject\ProductGroupData;
use GoSuccess\Digistore24\Api\Request\ProductGroup\CreateProductGroupRequest;
use PHPUnit\Framework\TestCase;

final class CreateProductGroupRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $group = new ProductGroupData();
        $group->name = 'Test Group';
        
        $request = new CreateProductGroupRequest(productGroup: $group);
        
        $this->assertInstanceOf(CreateProductGroupRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $group = new ProductGroupData();
        $group->name = 'Test Group';
        
        $request = new CreateProductGroupRequest(productGroup: $group);
        
        $this->assertSame('/createProductGroup', $request->getEndpoint());
    }

    public function test_to_array_includes_data(): void
    {
        $group = new ProductGroupData();
        $group->name = 'Test Group';
        $group->position = 20;
        
        $request = new CreateProductGroupRequest(productGroup: $group);
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('Test Group', $array['name']);
        $this->assertSame(20, $array['position']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $group = new ProductGroupData();
        $group->name = 'Test Group';
        
        $request = new CreateProductGroupRequest(productGroup: $group);
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

