<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Invoice;

use GoSuccess\Digistore24\Api\Request\Invoice\ResendInvoiceMailRequest;
use PHPUnit\Framework\TestCase;

final class ResendInvoiceMailRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ResendInvoiceMailRequest(purchaseId: 'P12345');
        
        $this->assertInstanceOf(ResendInvoiceMailRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ResendInvoiceMailRequest(purchaseId: 'P12345');
        
        $this->assertSame('resendInvoiceMail', $request->getEndpoint());
    }

    public function test_to_array_includes_purchase_id(): void
    {
        $request = new ResendInvoiceMailRequest(purchaseId: 'P12345');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ResendInvoiceMailRequest(purchaseId: 'P12345');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

