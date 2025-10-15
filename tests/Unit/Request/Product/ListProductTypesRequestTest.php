<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Product;

use GoSuccess\Digistore24\Api\Request\Product\ListProductTypesRequest;
use PHPUnit\Framework\TestCase;

final class ListProductTypesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListProductTypesRequest();
        
        $this->assertInstanceOf(ListProductTypesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListProductTypesRequest();
        
        $this->assertSame('/listProductTypes', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListProductTypesRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListProductTypesRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

