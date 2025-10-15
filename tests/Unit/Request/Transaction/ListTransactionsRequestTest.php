<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Transaction;

use GoSuccess\Digistore24\Api\Request\Transaction\ListTransactionsRequest;
use PHPUnit\Framework\TestCase;

final class ListTransactionsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListTransactionsRequest();
        
        $this->assertInstanceOf(ListTransactionsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListTransactionsRequest();
        
        $this->assertSame('/listTransactions', $request->getEndpoint());
    }

    public function test_to_array_with_parameters(): void
    {
        $request = new ListTransactionsRequest(
            from: '2024-01-01',
            to: '2024-12-31',
            pageNo: 2,
            pageSize: 50
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('2024-01-01', $array['from']);
        $this->assertSame('2024-12-31', $array['to']);
        $this->assertSame(2, $array['page_no']);
        $this->assertSame(50, $array['page_size']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListTransactionsRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

