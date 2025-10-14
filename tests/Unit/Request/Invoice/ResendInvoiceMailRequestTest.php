<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Invoice;

use GoSuccess\Digistore24\Api\Request\Invoice\ResendInvoiceMailRequest;
use PHPUnit\Framework\TestCase;

final class ResendInvoiceMailRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ResendInvoiceMailRequest();
        $this->assertInstanceOf(ResendInvoiceMailRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ResendInvoiceMailRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ResendInvoiceMailRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ResendInvoiceMailRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

