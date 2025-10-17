<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Product;

use GoSuccess\Digistore24\Api\Request\Product\UpdateProductRequest;
use PHPUnit\Framework\TestCase;

final class UpdateProductRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateProductRequest(productId: 12345);

        $this->assertInstanceOf(UpdateProductRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UpdateProductRequest(productId: 12345);

        $this->assertSame('/updateProduct', $request->getEndpoint());
    }

    public function test_to_array_includes_product_id_and_optional_fields(): void
    {
        $request = new UpdateProductRequest(
            productId: 12345,
            nameDe: 'Aktualisiertes Produkt',
            nameEn: 'Updated Product',
        );

        $array = $request->toArray();
        $this->assertSame(12345, $array['product_id']);
        $this->assertSame('Aktualisiertes Produkt', $array['name_de']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UpdateProductRequest(productId: 12345);

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
