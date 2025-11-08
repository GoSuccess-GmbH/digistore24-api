<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Fraud;

use GoSuccess\Digistore24\Api\Request\Fraud\ReportFraudRequest;
use PHPUnit\Framework\TestCase;

final class ReportFraudRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ReportFraudRequest(
            transactionId: 12345,
            who: 'buyer',
            comment: 'Fraudulent purchase',
        );

        $this->assertInstanceOf(ReportFraudRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ReportFraudRequest(
            transactionId: 12345,
            who: 'buyer',
            comment: 'Fraudulent purchase',
        );

        $this->assertSame('/reportFraud', $request->getEndpoint());
    }

    public function test_to_array_includes_all_data(): void
    {
        $request = new ReportFraudRequest(
            transactionId: 12345,
            who: 'buyer,affiliate',
            comment: 'Fraudulent purchase',
        );

        $array = $request->toArray();
        $this->assertSame(12345, $array['transaction_id']);
        $this->assertSame('buyer,affiliate', $array['who']);
        $this->assertSame('Fraudulent purchase', $array['comment']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ReportFraudRequest(
            transactionId: 12345,
            who: 'buyer',
            comment: 'Fraudulent purchase',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
