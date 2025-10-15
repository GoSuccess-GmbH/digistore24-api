<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Http\Response;

/**
 * E-Ticket Detail
 *
 * Represents detailed information about an e-ticket.
 */
final class EticketDetail
{
    public function __construct(
        public readonly string $orderId,
        public readonly string $ticketId,
        public readonly string $productId,
        public readonly string $productName,
        public readonly string $locationId,
        public readonly string $locationName,
        public readonly string $templateId,
        public readonly \DateTimeInterface $eventDate,
        public readonly int $days,
        public readonly ?string $note,
        public readonly string $buyerEmail,
        public readonly string $buyerFirstName,
        public readonly string $buyerLastName,
        public readonly bool $isValidated,
        public readonly ?\DateTimeInterface $validatedAt,
        public readonly \DateTimeInterface $createdAt,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            orderId: $data['order_id'] ?? '',
            ticketId: $data['ticket_id'] ?? '',
            productId: $data['product_id'] ?? '',
            productName: $data['product_name'] ?? '',
            locationId: $data['location_id'] ?? '',
            locationName: $data['location_name'] ?? '',
            templateId: $data['template_id'] ?? '',
            eventDate: new \DateTimeImmutable($data['event_date'] ?? 'now'),
            days: (int)($data['days'] ?? 1),
            note: $data['note'] ?? null,
            buyerEmail: $data['buyer_email'] ?? '',
            buyerFirstName: $data['buyer_first_name'] ?? '',
            buyerLastName: $data['buyer_last_name'] ?? '',
            isValidated: (bool)($data['is_validated'] ?? false),
            validatedAt: isset($data['validated_at']) ? new \DateTimeImmutable($data['validated_at']) : null,
            createdAt: new \DateTimeImmutable($data['created_at'] ?? 'now'),
        );
    }
}
