<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\AccountAccess;

use GoSuccess\Digistore24\Api\Request\AccountAccess\ListAccountAccessRequest;
use PHPUnit\Framework\TestCase;

final class ListAccountAccessRequestTest extends TestCase
{
    public function test_can_create_with_purchase_id(): void
    {
        $request = new ListAccountAccessRequest(
            purchaseId: 'ABC123',
        );

        $this->assertSame('ABC123', $request->purchaseId);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListAccountAccessRequest(
            purchaseId: 'ABC123',
        );

        $this->assertSame('/listAccountAccess', $request->getEndpoint());
    }

    public function test_to_array_converts_correctly(): void
    {
        $request = new ListAccountAccessRequest(
            purchaseId: 'ABC123',
        );

        $array = $request->toArray();        $this->assertSame('ABC123', $array['purchase_id']);
    }

    public function test_validation_passes_for_valid_data(): void
    {
        $request = new ListAccountAccessRequest(
            purchaseId: 'ABC123',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
