<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Invoice;

use GoSuccess\Digistore24\Api\Request\Invoice\ListInvoicesRequest;
use PHPUnit\Framework\TestCase;

final class ListInvoicesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListInvoicesRequest();
        $this->assertInstanceOf(ListInvoicesRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ListInvoicesRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListInvoicesRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListInvoicesRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

