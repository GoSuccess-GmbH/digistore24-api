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
        $instance = new self(
            success: (bool) ($data['success'] ?? true),
            ticketId: $data['ticket_id'] ?? '',
            orderId: $data['order_id'] ?? '',
            productName: $data['product_name'] ?? '',
            buyerName: $data['buyer_name'] ?? '',
            validatedAt: new \DateTimeImmutable($data['validated_at'] ?? 'now'),
            wasAlreadyValidated: (bool) ($data['was_already_validated'] ?? false),
            message: $data['message'] ?? null,
        );
        return $instance;
    }
}
