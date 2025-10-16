<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Invoice;

use GoSuccess\Digistore24\Api\Request\Invoice\ListInvoicesRequest;
use PHPUnit\Framework\TestCase;

final class ListInvoicesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListInvoicesRequest(purchaseId: 'P12345');

        $this->assertInstanceOf(ListInvoicesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListInvoicesRequest(purchaseId: 'P12345');

        $this->assertSame('/listInvoices', $request->getEndpoint());
    }

    public function test_to_array_includes_purchase_id(): void
    {
        $request = new ListInvoicesRequest(purchaseId: 'P12345');

        $array = $request->toArray();        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListInvoicesRequest(purchaseId: 'P12345');

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
