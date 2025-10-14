<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Eticket;

use GoSuccess\Digistore24\Api\Request\Eticket\ValidateEticketRequest;
use PHPUnit\Framework\TestCase;

final class ValidateEticketRequestTest extends TestCase
{
    public function test_can_create_with_ticket_id(): void
    {
        $request = new ValidateEticketRequest(
            ticketId: 'TICKET123',
        );

        $this->assertSame('TICKET123', $request->ticketId);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ValidateEticketRequest(
            ticketId: 'TICKET123',
        );

        $this->assertSame('/validateEticket', $request->getEndpoint());
    }

    public function test_to_array_converts_correctly(): void
    {
        $request = new ValidateEticketRequest(
            ticketId: 'TICKET123',
        );

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('TICKET123', $array['ticket_id']);
    }

    public function test_validation_passes_for_valid_data(): void
    {
        $request = new ValidateEticketRequest(
            ticketId: 'TICKET123',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
