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
        if (!is_array($ticketData)) {
            $ticketData = [];
        }

        $ticketId = $ticketData['ticket_id'] ?? '';
        $orderId = $ticketData['order_id'] ?? '';
        $productName = $ticketData['product_name'] ?? '';
        $buyerName = $ticketData['buyer_name'] ?? '';
        $validatedAt = $ticketData['validated_at'] ?? 'now';
        $message = $ticketData['message'] ?? null;

        return new self(
            success: (bool)($ticketData['success'] ?? true),
            ticketId: is_string($ticketId) ? $ticketId : '',
            orderId: is_string($orderId) ? $orderId : '',
            productName: is_string($productName) ? $productName : '',
            buyerName: is_string($buyerName) ? $buyerName : '',
            validatedAt: new \DateTimeImmutable(is_string($validatedAt) ? $validatedAt : 'now'),
            wasAlreadyValidated: (bool)($ticketData['was_already_validated'] ?? false),
            message: $message !== null && is_string($message) ? $message : null,
        );
    }
}
