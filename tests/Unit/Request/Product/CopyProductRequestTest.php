<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Product;

use GoSuccess\Digistore24\Api\Request\Product\CopyProductRequest;
use PHPUnit\Framework\TestCase;

final class CopyProductRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CopyProductRequest(productId: 12345);
        
        $this->assertInstanceOf(CopyProductRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CopyProductRequest(productId: 12345);
        
        $this->assertSame('copyProduct', $request->getEndpoint());
    }

    public function test_to_array_includes_product_id(): void
    {
        $request = new CopyProductRequest(productId: 12345, nameIntern: 'Copied Product');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('12345', $array['product_id']);
        $this->assertSame('Copied Product', $array['name_intern']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CopyProductRequest(productId: 12345);
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

