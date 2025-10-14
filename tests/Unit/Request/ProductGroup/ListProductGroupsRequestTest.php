<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ProductGroup;

use GoSuccess\Digistore24\Api\Request\ProductGroup\ListProductGroupsRequest;
use PHPUnit\Framework\TestCase;

final class ListProductGroupsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListProductGroupsRequest();
        
        $this->assertInstanceOf(ListProductGroupsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListProductGroupsRequest();
        
        $this->assertSame('listProductGroups', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListProductGroupsRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListProductGroupsRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

