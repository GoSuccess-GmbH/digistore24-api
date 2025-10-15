<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Validate E-Ticket Response
 *
 * Response after validating an e-ticket.
 */
final class ValidateEticketResponse extends AbstractResponse
{
    public function __construct(
        public readonly bool $success,
        public readonly string $ticketId,
        public readonly string $orderId,
        public readonly string $productName,
        public readonly string $buyerName,
        public readonly \DateTimeInterface $validatedAt,
        public readonly bool $wasAlreadyValidated,
        public readonly ?string $message = null,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        // Support both direct and nested data structures
        $ticketData = $data['data'] ?? $data;
        
        return new self(
            success: (bool) ($ticketData['success'] ?? true),
            ticketId: $ticketData['ticket_id'] ?? '',
            orderId: $ticketData['order_id'] ?? '',
            productName: $ticketData['product_name'] ?? '',
            buyerName: $ticketData['buyer_name'] ?? '',
            validatedAt: new \DateTimeImmutable($ticketData['validated_at'] ?? 'now'),
            wasAlreadyValidated: (bool) ($ticketData['was_already_validated'] ?? false),
            message: $ticketData['message'] ?? null,
        );
    }
}
