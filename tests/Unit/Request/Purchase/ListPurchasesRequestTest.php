<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\DTO\PurchaseSearchData;
use GoSuccess\Digistore24\Api\Enum\OrderType;
use GoSuccess\Digistore24\Api\Enum\PurchaseSortBy;
use GoSuccess\Digistore24\Api\Enum\SortOrder;
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

    public function test_to_array_with_defaults(): void
    {
        $request = new ListPurchasesRequest();

        $array = $request->toArray();
        $this->assertSame('-24h', $array['from']);
        $this->assertSame('now', $array['to']);
        $this->assertSame('date', $array['sort_by']);
        $this->assertSame('asc', $array['sort_order']);
        $this->assertFalse($array['load_transactions']);
        $this->assertSame(1, $array['page_no']);
        $this->assertSame(500, $array['page_size']);
    }

    public function test_to_array_with_custom_parameters(): void
    {
        $search = new PurchaseSearchData(
            email: 'test@example.com',
            productId: '12345',
            orderType: OrderType::LIVE,
        );

        $request = new ListPurchasesRequest(
            from: '2024-01-01',
            to: '2024-12-31',
            search: $search,
            sortBy: PurchaseSortBy::EARNING,
            sortOrder: SortOrder::DESC,
            loadTransactions: true,
            pageNo: 2,
            pageSize: 100,
        );

        $array = $request->toArray();
        $this->assertSame('2024-01-01', $array['from']);
        $this->assertSame('2024-12-31', $array['to']);
        $this->assertArrayHasKey('search', $array);
        $this->assertIsArray($array['search']);
        $this->assertSame('test@example.com', $array['search']['email']);
        $this->assertSame('12345', $array['search']['product_id']);
        $this->assertSame('live', $array['search']['order_type']);
        $this->assertSame('earning', $array['sort_by']);
        $this->assertSame('desc', $array['sort_order']);
        $this->assertTrue($array['load_transactions']);
        $this->assertSame(2, $array['page_no']);
        $this->assertSame(100, $array['page_size']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListPurchasesRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
