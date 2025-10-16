<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Upsell;

use GoSuccess\Digistore24\Api\Request\Upsell\DeleteUpsellsRequest;
use PHPUnit\Framework\TestCase;

final class DeleteUpsellsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeleteUpsellsRequest(productId: 12345);

        $this->assertInstanceOf(DeleteUpsellsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new DeleteUpsellsRequest(productId: 12345);

        $this->assertSame('/deleteUpsells', $request->getEndpoint());
    }

    public function test_to_array_includes_product_id(): void
    {
        $request = new DeleteUpsellsRequest(productId: 12345);

        $array = $request->toArray();        $this->assertSame(12345, $array['product_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new DeleteUpsellsRequest(productId: 12345);

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
