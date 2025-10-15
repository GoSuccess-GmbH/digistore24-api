<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\ListPurchasesRequest;
use PHPUnit\Framework\TestCase;

final class ListPurchasesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListPurchasesRequest();

        $this->assertInstanceOf(ListPurchasesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListPurchasesRequest();

        $this->assertSame('/listPurchases', $request->getEndpoint());
    }

    public function test_to_array_with_parameters(): void
    {
        $request = new ListPurchasesRequest(productId: '12345', buyerEmail: 'test@example.com');

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('12345', $array['product_id']);
        $this->assertSame('test@example.com', $array['buyer_email']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListPurchasesRequest();

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
