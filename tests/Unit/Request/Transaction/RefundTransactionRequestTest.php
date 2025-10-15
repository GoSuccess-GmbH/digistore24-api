<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Transaction;

use GoSuccess\Digistore24\Api\Request\Transaction\RefundTransactionRequest;
use PHPUnit\Framework\TestCase;

final class RefundTransactionRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RefundTransactionRequest(transactionId: 'T12345');

        $this->assertInstanceOf(RefundTransactionRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new RefundTransactionRequest(transactionId: 'T12345');

        $this->assertSame('/refundTransaction', $request->getEndpoint());
    }

    public function test_to_array_includes_transaction_id(): void
    {
        $request = new RefundTransactionRequest(transactionId: 'T12345', force: true);

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('T12345', $array['transaction_id']);
        $this->assertTrue($array['force']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new RefundTransactionRequest(transactionId: 'T12345');

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
