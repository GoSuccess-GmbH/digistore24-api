<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Eticket;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Eticket\EticketListItem;
use GoSuccess\Digistore24\Api\Response\Eticket\ListEticketsResponse;
use PHPUnit\Framework\TestCase;

final class ListEticketsResponseTest extends TestCase
{
    public function test_can_create_from_array_with_tickets(): void
    {
        $data = [
            'tickets' => [
                [
                    'order_id' => 'ORDER123',
                    'ticket_id' => 'TICKET456',
                    'product_id' => '12345',
                    'product_name' => 'Conference 2024',
                    'location_id' => 'LOC001',
                    'location_name' => 'Convention Center',
                    'event_date' => '2024-06-15',
                    'days' => 2,
                    'buyer_email' => 'buyer@example.com',
                    'buyer_first_name' => 'John',
                    'buyer_last_name' => 'Doe',
                    'is_validated' => false,
                    'validated_at' => null,
                    'created_at' => '2024-01-15 10:30:00',
                ],
            ],
            'total_count' => 1,
        ];

        $response = ListEticketsResponse::fromArray($data);

        $this->assertCount(1, $response->tickets);
        $this->assertSame(1, $response->totalCount);
        $this->assertInstanceOf(EticketListItem::class, $response->tickets[0]);
        $this->assertSame('ORDER123', $response->tickets[0]->orderId);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            200,
            ['data' => [
                'tickets' => [
                    [
                        'order_id' => 'ORDER789',
                        'ticket_id' => 'TICKET999',
                        'product_id' => '67890',
                        'product_name' => 'Workshop 2024',
                        'location_id' => 'LOC002',
                        'location_name' => 'Training Room',
                        'event_date' => '2024-07-20',
                        'days' => 1,
                        'buyer_email' => 'jane@example.com',
                        'buyer_first_name' => 'Jane',
                        'buyer_last_name' => 'Smith',
                        'is_validated' => true,
                        'validated_at' => '2024-07-20 09:15:00',
                        'created_at' => '2024-02-01 14:20:00',
                    ],
                ],
                'total_count' => 10,
            ]],
        );

        $response = ListEticketsResponse::fromResponse($httpResponse);

        $this->assertCount(1, $response->tickets);
        $this->assertSame(10, $response->totalCount);
        $this->assertSame('Workshop 2024', $response->tickets[0]->productName);
        $this->assertTrue($response->tickets[0]->isValidated);
    }

    public function test_handles_empty_tickets_array(): void
    {
        $data = [
            'tickets' => [],
            'total_count' => 0,
        ];

        $response = ListEticketsResponse::fromArray($data);

        $this->assertCount(0, $response->tickets);
        $this->assertSame(0, $response->totalCount);
    }

    public function test_handles_missing_tickets_key(): void
    {
        $data = [];

        $response = ListEticketsResponse::fromArray($data);

        $this->assertCount(0, $response->tickets);
        $this->assertSame(0, $response->totalCount);
    }

    public function test_total_count_defaults_to_array_count(): void
    {
        $data = [
            'tickets' => [
                [
                    'order_id' => 'ORDER111',
                    'ticket_id' => 'TICKET222',
                    'product_id' => '11111',
                    'product_name' => 'Event',
                    'location_id' => 'LOC003',
                    'location_name' => 'Arena',
                    'event_date' => '2024-08-10',
                    'days' => 1,
                    'buyer_email' => 'test@example.com',
                    'buyer_first_name' => 'Test',
                    'buyer_last_name' => 'User',
                    'is_validated' => false,
                    'validated_at' => null,
                    'created_at' => '2024-03-01 12:00:00',
                ],
            ],
            // No total_count provided
        ];

        $response = ListEticketsResponse::fromArray($data);

        $this->assertSame(1, $response->totalCount);
    }

    public function test_eticket_list_item_from_array(): void
    {
        $data = [
            'order_id' => 'ORDER333',
            'ticket_id' => 'TICKET444',
            'product_id' => '33333',
            'product_name' => 'Seminar',
            'location_id' => 'LOC004',
            'location_name' => 'Online',
            'event_date' => '2024-09-01',
            'days' => 3,
            'buyer_email' => 'buyer2@example.com',
            'buyer_first_name' => 'Bob',
            'buyer_last_name' => 'Johnson',
            'is_validated' => false,
            'validated_at' => null,
            'created_at' => '2024-04-01 10:00:00',
        ];

        $item = EticketListItem::fromArray($data);

        $this->assertSame('ORDER333', $item->orderId);
        $this->assertSame('TICKET444', $item->ticketId);
        $this->assertSame('Seminar', $item->productName);
        $this->assertSame(3, $item->days);
        $this->assertFalse($item->isValidated);
        $this->assertNull($item->validatedAt);
        $this->assertInstanceOf(\DateTimeInterface::class, $item->eventDate);
    }

    public function test_handles_multiple_tickets(): void
    {
        $data = [
            'tickets' => [
                [
                    'order_id' => 'ORDER001',
                    'ticket_id' => 'TICKET001',
                    'product_id' => '111',
                    'product_name' => 'Event A',
                    'location_id' => 'LOC001',
                    'location_name' => 'Hall A',
                    'event_date' => '2024-10-01',
                    'days' => 1,
                    'buyer_email' => 'buyer1@example.com',
                    'buyer_first_name' => 'Alice',
                    'buyer_last_name' => 'Brown',
                    'is_validated' => true,
                    'validated_at' => '2024-10-01 10:00:00',
                    'created_at' => '2024-05-01 12:00:00',
                ],
                [
                    'order_id' => 'ORDER002',
                    'ticket_id' => 'TICKET002',
                    'product_id' => '222',
                    'product_name' => 'Event B',
                    'location_id' => 'LOC002',
                    'location_name' => 'Hall B',
                    'event_date' => '2024-11-01',
                    'days' => 2,
                    'buyer_email' => 'buyer2@example.com',
                    'buyer_first_name' => 'Charlie',
                    'buyer_last_name' => 'Davis',
                    'is_validated' => false,
                    'validated_at' => null,
                    'created_at' => '2024-06-01 14:00:00',
                ],
            ],
            'total_count' => 25,
        ];

        $response = ListEticketsResponse::fromArray($data);

        $this->assertCount(2, $response->tickets);
        $this->assertSame(25, $response->totalCount);
        $this->assertSame('Event A', $response->tickets[0]->productName);
        $this->assertSame('Event B', $response->tickets[1]->productName);
        $this->assertTrue($response->tickets[0]->isValidated);
        $this->assertFalse($response->tickets[1]->isValidated);
    }
}
