<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Product;

use GoSuccess\Digistore24\Api\Enum\ProductSortBy;
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

    public function test_to_array_with_default_sort(): void
    {
        $request = new ListProductsRequest();

        $array = $request->toArray();
        $this->assertSame('name', $array['sort_by']);
    }

    public function test_to_array_with_custom_sort(): void
    {
        $request = new ListProductsRequest(sortBy: ProductSortBy::GROUP);

        $array = $request->toArray();
        $this->assertSame('group', $array['sort_by']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListProductsRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
