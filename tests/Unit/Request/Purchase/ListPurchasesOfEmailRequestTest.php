<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\ListPurchasesOfEmailRequest;
use PHPUnit\Framework\TestCase;

final class ListPurchasesOfEmailRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListPurchasesOfEmailRequest(email: 'test@example.com');

        $this->assertInstanceOf(ListPurchasesOfEmailRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListPurchasesOfEmailRequest(email: 'test@example.com');

        $this->assertSame('/listPurchasesOfEmail', $request->getEndpoint());
    }

    public function test_to_array_includes_email_and_limit(): void
    {
        $request = new ListPurchasesOfEmailRequest(email: 'test@example.com', limit: 50);

        $array = $request->toArray();        $this->assertSame('test@example.com', $array['email']);
        $this->assertSame(50, $array['limit']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListPurchasesOfEmailRequest(email: 'test@example.com');

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
