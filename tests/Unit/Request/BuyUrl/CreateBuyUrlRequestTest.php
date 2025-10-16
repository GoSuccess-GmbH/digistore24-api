<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
use PHPUnit\Framework\TestCase;

final class CreateBuyUrlRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new CreateBuyUrlRequest();
        $request->productId = 12345;

        $this->assertInstanceOf(CreateBuyUrlRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new CreateBuyUrlRequest();
        $request->productId = 12345;

        $this->assertSame('/createBuyUrl', $request->getEndpoint());
    }

    public function test_to_array_includes_product_id(): void
    {
        $request = new CreateBuyUrlRequest();
        $request->productId = 12345;

        $array = $request->toArray();        $this->assertSame(12345, $array['product_id']);
    }

    public function test_to_array_includes_optional_data(): void
    {
        $request = new CreateBuyUrlRequest();
        $request->productId = 12345;
        $request->validUntil = '48h';
        $request->placeholders = ['title' => 'Custom Title'];

        $array = $request->toArray();        $this->assertSame('48h', $array['valid_until']);
        $this->assertArrayHasKey('placeholders', $array);
    }

    public function test_validate_fails_without_product_id(): void
    {
        $request = new CreateBuyUrlRequest();

        $errors = $request->validate();        $this->assertNotEmpty($errors);
    }

    public function test_validate_succeeds_with_product_id(): void
    {
        $request = new CreateBuyUrlRequest();
        $request->productId = 12345;

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
