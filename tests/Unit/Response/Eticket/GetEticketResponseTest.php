<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Eticket;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Eticket\EticketDetail;
use GoSuccess\Digistore24\Api\Response\Eticket\GetEticketResponse;
use PHPUnit\Framework\TestCase;

final class GetEticketResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'order_id' => 'ORDER123',
            'ticket_id' => 'TICKET456',
            'product_id' => '12345',
            'product_name' => 'Conference 2024',
            'location_id' => 'LOC001',
            'location_name' => 'Convention Center',
            'template_id' => 'TPL001',
            'event_date' => '2024-06-15',
            'days' => 2,
            'note' => '09:00 - 17:00',
            'buyer_email' => 'buyer@example.com',
            'buyer_first_name' => 'John',
            'buyer_last_name' => 'Doe',
            'is_validated' => false,
            'validated_at' => null,
            'created_at' => '2024-01-15 10:30:00',
        ];

        $response = GetEticketResponse::fromArray($data);

        $this->assertInstanceOf(EticketDetail::class, $response->ticket);
        $this->assertSame('ORDER123', $response->ticket->orderId);
        $this->assertSame('TICKET456', $response->ticket->ticketId);
        $this->assertSame('Conference 2024', $response->ticket->productName);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            200,
            ['data' => [
                'order_id' => 'ORDER789',
                'ticket_id' => 'TICKET999',
                'product_id' => '67890',
                'product_name' => 'Workshop 2024',
                'location_id' => 'LOC002',
                'location_name' => 'Training Room',
                'template_id' => 'TPL002',
                'event_date' => '2024-07-20',
                'days' => 1,
                'note' => null,
                'buyer_email' => 'jane@example.com',
                'buyer_first_name' => 'Jane',
                'buyer_last_name' => 'Smith',
                'is_validated' => true,
                'validated_at' => '2024-07-20 09:15:00',
                'created_at' => '2024-02-01 14:20:00',
            ]],
        );

        $response = GetEticketResponse::fromResponse($httpResponse);

        $this->assertSame('ORDER789', $response->ticket->orderId);
        $this->assertSame('Workshop 2024', $response->ticket->productName);
        $this->assertTrue($response->ticket->isValidated);
        $this->assertInstanceOf(\DateTimeInterface::class, $response->ticket->validatedAt);
    }

    public function test_eticket_detail_from_array(): void
    {
        $data = [
            'order_id' => 'ORDER111',
            'ticket_id' => 'TICKET222',
            'product_id' => '11111',
            'product_name' => 'Seminar',
            'location_id' => 'LOC003',
            'location_name' => 'Online',
            'template_id' => 'TPL003',
            'event_date' => '2024-08-10',
            'days' => 3,
            'note' => 'Zoom link will be sent',
            'buyer_email' => 'test@example.com',
            'buyer_first_name' => 'Test',
            'buyer_last_name' => 'User',
            'is_validated' => false,
            'validated_at' => null,
            'created_at' => '2024-03-01 12:00:00',
        ];

        $detail = EticketDetail::fromArray($data);

        $this->assertSame('ORDER111', $detail->orderId);
        $this->assertSame('TICKET222', $detail->ticketId);
        $this->assertSame('Seminar', $detail->productName);
        $this->assertSame(3, $detail->days);
        $this->assertSame('Zoom link will be sent', $detail->note);
        $this->assertFalse($detail->isValidated);
        $this->assertNull($detail->validatedAt);
        $this->assertInstanceOf(\DateTimeInterface::class, $detail->eventDate);
        $this->assertInstanceOf(\DateTimeInterface::class, $detail->createdAt);
    }

    public function test_handles_validated_ticket(): void
    {
        $data = [
            'order_id' => 'ORDER333',
            'ticket_id' => 'TICKET444',
            'product_id' => '33333',
            'product_name' => 'Event',
            'location_id' => 'LOC004',
            'location_name' => 'Arena',
            'template_id' => 'TPL004',
            'event_date' => '2024-09-01',
            'days' => 1,
            'note' => 'Gate A',
            'buyer_email' => 'buyer2@example.com',
            'buyer_first_name' => 'Bob',
            'buyer_last_name' => 'Johnson',
            'is_validated' => true,
            'validated_at' => '2024-09-01 18:30:00',
            'created_at' => '2024-04-01 10:00:00',
        ];

        $detail = EticketDetail::fromArray($data);

        $this->assertTrue($detail->isValidated);
        $this->assertInstanceOf(\DateTimeInterface::class, $detail->validatedAt);
        $this->assertSame('2024-09-01 18:30:00', $detail->validatedAt->format('Y-m-d H:i:s'));
    }
}
