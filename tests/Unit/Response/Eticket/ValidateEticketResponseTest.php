<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Eticket;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Eticket\ValidateEticketResponse;
use PHPUnit\Framework\TestCase;

final class ValidateEticketResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'success' => true,
            'ticket_id' => 'TICKET123',
            'order_id' => 'ORDER456',
            'product_name' => 'Conference 2024',
            'buyer_name' => 'John Doe',
            'validated_at' => '2024-06-15 10:30:00',
            'was_already_validated' => false,
            'message' => 'Ticket validated successfully',
        ];

        $response = ValidateEticketResponse::fromArray($data);

        $this->assertTrue($response->success);
        $this->assertSame('TICKET123', $response->ticketId);
        $this->assertSame('ORDER456', $response->orderId);
        $this->assertSame('Conference 2024', $response->productName);
        $this->assertSame('John Doe', $response->buyerName);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->validatedAt);
        $this->assertFalse($response->wasAlreadyValidated);
        $this->assertSame('Ticket validated successfully', $response->message);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            200,
            ['data' => [
                'success' => true,
                'ticket_id' => 'TICKET789',
                'order_id' => 'ORDER999',
                'product_name' => 'Workshop 2024',
                'buyer_name' => 'Jane Smith',
                'validated_at' => '2024-07-20 14:15:00',
                'was_already_validated' => false,
                'message' => null,
            ]],
        );

        $response = ValidateEticketResponse::fromResponse($httpResponse);

        $this->assertTrue($response->success);
        $this->assertSame('TICKET789', $response->ticketId);
        $this->assertSame('Workshop 2024', $response->productName);
        $this->assertSame('Jane Smith', $response->buyerName);
        $this->assertFalse($response->wasAlreadyValidated);
        $this->assertNull($response->message);
    }

    public function test_handles_already_validated_ticket(): void
    {
        $data = [
            'success' => true,
            'ticket_id' => 'TICKET111',
            'order_id' => 'ORDER222',
            'product_name' => 'Event',
            'buyer_name' => 'Bob Johnson',
            'validated_at' => '2024-08-01 09:00:00',
            'was_already_validated' => true,
            'message' => 'Warning: This ticket was already validated',
        ];

        $response = ValidateEticketResponse::fromArray($data);

        $this->assertTrue($response->success);
        $this->assertTrue($response->wasAlreadyValidated);
        $this->assertSame('Warning: This ticket was already validated', $response->message);
    }

    public function test_handles_failed_validation(): void
    {
        $data = [
            'success' => false,
            'ticket_id' => 'TICKET333',
            'order_id' => '',
            'product_name' => '',
            'buyer_name' => '',
            'validated_at' => '2024-09-01 10:00:00',
            'was_already_validated' => false,
            'message' => 'Ticket not found or invalid',
        ];

        $response = ValidateEticketResponse::fromArray($data);

        $this->assertFalse($response->success);
        $this->assertSame('TICKET333', $response->ticketId);
        $this->assertSame('Ticket not found or invalid', $response->message);
    }

    public function test_handles_missing_optional_fields(): void
    {
        $data = [
            'ticket_id' => 'TICKET444',
            'order_id' => 'ORDER555',
            'product_name' => 'Seminar',
            'buyer_name' => 'Alice Brown',
            'validated_at' => '2024-10-01 11:00:00',
        ];

        $response = ValidateEticketResponse::fromArray($data);

        $this->assertTrue($response->success); // defaults to true
        $this->assertFalse($response->wasAlreadyValidated); // defaults to false
        $this->assertNull($response->message); // defaults to null
    }

    public function test_validated_at_is_datetime_interface(): void
    {
        $data = [
            'success' => true,
            'ticket_id' => 'TICKET666',
            'order_id' => 'ORDER777',
            'product_name' => 'Concert',
            'buyer_name' => 'Charlie Davis',
            'validated_at' => '2024-11-15 20:30:45',
            'was_already_validated' => false,
        ];

        $response = ValidateEticketResponse::fromArray($data);

        $this->assertInstanceOf(\DateTimeInterface::class, $response->validatedAt);
        $this->assertSame('2024-11-15 20:30:45', $response->validatedAt->format('Y-m-d H:i:s'));
    }
}
