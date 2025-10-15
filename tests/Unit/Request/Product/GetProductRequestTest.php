<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Product;

use GoSuccess\Digistore24\Api\Request\Product\GetProductRequest;
use PHPUnit\Framework\TestCase;

final class GetProductRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetProductRequest(productId: '12345');

        $this->assertInstanceOf(GetProductRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetProductRequest(productId: '12345');

        $this->assertSame('/getProduct', $request->getEndpoint());
    }

    public function test_to_array_includes_product_id(): void
    {
        $request = new GetProductRequest(productId: '12345');

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('12345', $array['product_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetProductRequest(productId: '12345');

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
