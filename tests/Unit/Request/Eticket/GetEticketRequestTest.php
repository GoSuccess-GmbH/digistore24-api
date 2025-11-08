<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Eticket;

use GoSuccess\Digistore24\Api\Request\Eticket\GetEticketRequest;
use PHPUnit\Framework\TestCase;

final class GetEticketRequestTest extends TestCase
{
    public function test_can_create_with_order_id(): void
    {
        $request = new GetEticketRequest(
            orderId: 'ORDER123',
        );

        $this->assertSame('ORDER123', $request->orderId);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetEticketRequest(
            orderId: 'ORDER123',
        );

        $this->assertSame('/getEticket', $request->getEndpoint());
    }

    public function test_to_array_converts_correctly(): void
    {
        $request = new GetEticketRequest(
            orderId: 'ORDER123',
        );

        $array = $request->toArray();
        $this->assertSame('ORDER123', $array['order_id']);
    }

    public function test_validation_passes_for_valid_data(): void
    {
        $request = new GetEticketRequest(
            orderId: 'ORDER123',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
