<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Product;

use GoSuccess\Digistore24\Api\Request\Product\ListProductsRequest;
use PHPUnit\Framework\TestCase;

final class ListProductsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListProductsRequest();

        $this->assertInstanceOf(ListProductsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListProductsRequest();

        $this->assertSame('/listProducts', $request->getEndpoint());
    }

    public function test_to_array_with_parameters(): void
    {
        $request = new ListProductsRequest(productType: 'digital', onlyPublished: true);

        $array = $request->toArray();
        $this->assertSame('digital', $array['product_type']);
        $this->assertSame('y', $array['only_published']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListProductsRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
