<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Buyer;

use GoSuccess\Digistore24\Api\Request\Buyer\ListBuyersRequest;
use PHPUnit\Framework\TestCase;

final class ListBuyersRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListBuyersRequest();

        $this->assertInstanceOf(ListBuyersRequest::class, $request);
    }

    public function test_can_create_instance_with_pagination(): void
    {
        $request = new ListBuyersRequest(pageNo: 2, pageSize: 50);

        $this->assertInstanceOf(ListBuyersRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListBuyersRequest();

        $this->assertSame('/listBuyers', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array_without_pagination(): void
    {
        $request = new ListBuyersRequest();

        $array = $request->toArray();        $this->assertEmpty($array);
    }

    public function test_to_array_includes_pagination_data(): void
    {
        $request = new ListBuyersRequest(pageNo: 2, pageSize: 50);

        $array = $request->toArray();        $this->assertSame(2, $array['page_no']);
        $this->assertSame(50, $array['page_size']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListBuyersRequest();

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
