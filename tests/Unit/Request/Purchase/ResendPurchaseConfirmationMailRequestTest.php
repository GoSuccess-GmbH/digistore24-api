<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\ResendPurchaseConfirmationMailRequest;
use PHPUnit\Framework\TestCase;

final class ResendPurchaseConfirmationMailRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ResendPurchaseConfirmationMailRequest(purchaseId: 'P12345');

        $this->assertInstanceOf(ResendPurchaseConfirmationMailRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ResendPurchaseConfirmationMailRequest(purchaseId: 'P12345');

        $this->assertSame('/resendPurchaseConfirmationMail', $request->getEndpoint());
    }

    public function test_to_array_includes_purchase_id(): void
    {
        $request = new ResendPurchaseConfirmationMailRequest(purchaseId: 'P12345');

        $array = $request->toArray();
        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ResendPurchaseConfirmationMailRequest(purchaseId: 'P12345');

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
