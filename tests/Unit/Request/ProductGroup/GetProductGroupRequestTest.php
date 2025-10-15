<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ProductGroup;

use GoSuccess\Digistore24\Api\Request\ProductGroup\GetProductGroupRequest;
use PHPUnit\Framework\TestCase;

final class GetProductGroupRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetProductGroupRequest(productGroupId: 'PG123');

        $this->assertInstanceOf(GetProductGroupRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetProductGroupRequest(productGroupId: 'PG123');

        $this->assertSame('/getProductGroup', $request->getEndpoint());
    }

    public function test_to_array_includes_product_group_id(): void
    {
        $request = new GetProductGroupRequest(productGroupId: 'PG123');

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('PG123', $array['product_group_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetProductGroupRequest(productGroupId: 'PG123');

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
