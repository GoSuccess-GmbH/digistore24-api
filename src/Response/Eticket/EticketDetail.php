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

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $orderId = $data['order_id'] ?? '';
        $ticketId = $data['ticket_id'] ?? '';
        $productId = $data['product_id'] ?? '';
        $productName = $data['product_name'] ?? '';
        $locationId = $data['location_id'] ?? '';
        $locationName = $data['location_name'] ?? '';
        $templateId = $data['template_id'] ?? '';
        $eventDate = $data['event_date'] ?? 'now';
        $days = $data['days'] ?? 1;
        $note = $data['note'] ?? null;
        $buyerEmail = $data['buyer_email'] ?? '';
        $buyerFirstName = $data['buyer_first_name'] ?? '';
        $buyerLastName = $data['buyer_last_name'] ?? '';
        $isValidated = $data['is_validated'] ?? false;
        $validatedAt = $data['validated_at'] ?? null;
        $createdAt = $data['created_at'] ?? 'now';

        return new self(
            orderId: is_string($orderId) ? $orderId : '',
            ticketId: is_string($ticketId) ? $ticketId : '',
            productId: is_string($productId) ? $productId : '',
            productName: is_string($productName) ? $productName : '',
            locationId: is_string($locationId) ? $locationId : '',
            locationName: is_string($locationName) ? $locationName : '',
            templateId: is_string($templateId) ? $templateId : '',
            eventDate: new \DateTimeImmutable(is_string($eventDate) ? $eventDate : 'now'),
            days: is_int($days) ? $days : 1,
            note: $note === null || is_string($note) ? $note : null,
            buyerEmail: is_string($buyerEmail) ? $buyerEmail : '',
            buyerFirstName: is_string($buyerFirstName) ? $buyerFirstName : '',
            buyerLastName: is_string($buyerLastName) ? $buyerLastName : '',
            isValidated: is_bool($isValidated) ? $isValidated : false,
            validatedAt: $validatedAt !== null && is_string($validatedAt) ? new \DateTimeImmutable($validatedAt) : null,
            createdAt: new \DateTimeImmutable(is_string($createdAt) ? $createdAt : 'now'),
        );
    }
}
