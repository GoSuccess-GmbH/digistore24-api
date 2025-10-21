<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Product;

use GoSuccess\Digistore24\Api\Request\Product\CreateProductRequest;
use PHPUnit\Framework\TestCase;

final class CreateProductRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateProductRequest(nameIntern: 'Test Product');

        $this->assertInstanceOf(CreateProductRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateProductRequest(nameIntern: 'Test Product');

        $this->assertSame('/createProduct', $request->getEndpoint());
    }

    public function test_to_array_includes_name_intern(): void
    {
        $request = new CreateProductRequest(
            nameIntern: 'Test Product',
            nameDe: 'Testprodukt',
            productTypeId: 1,
        );

        $array = $request->toArray();

        $this->assertArrayHasKey('data', $array);
        $data = $array['data'] ?? null;
        $this->assertIsArray($data);
        /** @var array<string, mixed> $validatedData */
        $validatedData = $data;
        $this->assertSame('Test Product', $validatedData['name_intern']);
        $this->assertSame('Testprodukt', $validatedData['name_de']);
        $this->assertSame(1, $validatedData['product_type_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new CreateProductRequest(nameIntern: 'Test Product');

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
