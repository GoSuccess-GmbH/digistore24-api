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

    public function test_endpoint_returns_string(): void
    {
        $request = new ListTransactionsRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListTransactionsRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListTransactionsRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

