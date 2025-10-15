<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * E-Ticket List Item
 *
 * Represents a summary of an e-ticket in a list.
 */
final class EticketListItem
{
    public function __construct(
        public readonly string $orderId,
        public readonly string $ticketId,
        public readonly string $productId,
        public readonly string $productName,
        public readonly string $locationId,
        public readonly string $locationName,
        public readonly \DateTimeInterface $eventDate,
        public readonly int $days,
        public readonly string $buyerEmail,
        public readonly string $buyerFirstName,
        public readonly string $buyerLastName,
        public readonly bool $isValidated,
        public readonly ?\DateTimeInterface $validatedAt,
        public readonly \DateTimeInterface $createdAt,
    ) {
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            orderId: $data['order_id'] ?? '',
            ticketId: $data['ticket_id'] ?? '',
            productId: $data['product_id'] ?? '',
            productName: $data['product_name'] ?? '',
            locationId: $data['location_id'] ?? '',
            locationName: $data['location_name'] ?? '',
            eventDate: new \DateTimeImmutable($data['event_date'] ?? 'now'),
            days: (int) ($data['days'] ?? 1),
            buyerEmail: $data['buyer_email'] ?? '',
            buyerFirstName: $data['buyer_first_name'] ?? '',
            buyerLastName: $data['buyer_last_name'] ?? '',
            isValidated: (bool) ($data['is_validated'] ?? false),
            validatedAt: isset($data['validated_at']) ? new \DateTimeImmutable($data['validated_at']) : null,
            createdAt: new \DateTimeImmutable($data['created_at'] ?? 'now'),
        );
    }
}

/**
 * List E-Tickets Response
 *
 * Response containing a list of e-tickets.
 */
final class ListEticketsResponse extends AbstractResponse
{
    /**
     * @param array<EticketListItem> $tickets Array of e-ticket list items
     * @param int $totalCount Total number of tickets matching the filter
     */
    public function __construct(
        public readonly array $tickets,
        public readonly int $totalCount,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $tickets = [];
        
        // Support both direct and nested data structures
        $ticketsData = $data['data']['tickets'] ?? $data['tickets'] ?? [];

        if (is_array($ticketsData)) {
            foreach ($ticketsData as $ticket) {
                $tickets[] = EticketListItem::fromArray($ticket);
            }
        }

        return new self(
            tickets: $tickets,
            totalCount: (int) ($data['data']['total_count'] ?? $data['total_count'] ?? count($tickets)),
        );
    }
}
