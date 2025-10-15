<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Commission;

use GoSuccess\Digistore24\Api\Request\Commission\ListCommissionsRequest;
use PHPUnit\Framework\TestCase;

final class ListCommissionsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListCommissionsRequest();
        
        $this->assertInstanceOf(ListCommissionsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListCommissionsRequest();
        
        $this->assertSame('/listCommissions', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array_without_parameters(): void
    {
        $request = new ListCommissionsRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_to_array_includes_all_optional_parameters(): void
    {
        $request = new ListCommissionsRequest(
            from: '2024-01-01',
            to: '2024-12-31',
            pageNo: 2,
            pageSize: 50,
            transactionType: 'payment',
            commissionType: 'fixed',
            purchaseId: 'P12345'
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('2024-01-01', $array['from']);
        $this->assertSame('2024-12-31', $array['to']);
        $this->assertSame(2, $array['page_no']);
        $this->assertSame(50, $array['page_size']);
        $this->assertSame('payment', $array['transaction_type']);
        $this->assertSame('fixed', $array['commission_type']);
        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListCommissionsRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

