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
    public string $result { get => $this->result ?? ''; }

    public bool $success { get => $this->success ?? true; }

    public string $ticketId { get => $this->ticketId ?? ''; }

    public string $orderId { get => $this->orderId ?? ''; }

    public string $productName { get => $this->productName ?? ''; }

    public string $buyerName { get => $this->buyerName ?? ''; }

    public \DateTimeInterface $validatedAt { get => $this->validatedAt ?? new \DateTimeImmutable(); }

    public bool $wasAlreadyValidated { get => $this->wasAlreadyValidated ?? false; }

    public ?string $message { get => $this->message ?? null; }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        // Support both direct and nested data structures
        $ticketData = $data['data'] ?? $data;
        if (! is_array($ticketData)) {
            $ticketData = [];
        }

        $ticketId = $ticketData['ticket_id'] ?? '';
        $orderId = $ticketData['order_id'] ?? '';
        $productName = $ticketData['product_name'] ?? '';
        $buyerName = $ticketData['buyer_name'] ?? '';
        $validatedAt = $ticketData['validated_at'] ?? 'now';
        $message = $ticketData['message'] ?? null;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->success = (bool)($ticketData['success'] ?? true);
        $response->ticketId = is_string($ticketId) ? $ticketId : '';
        $response->orderId = is_string($orderId) ? $orderId : '';
        $response->productName = is_string($productName) ? $productName : '';
        $response->buyerName = is_string($buyerName) ? $buyerName : '';
        $response->validatedAt = new \DateTimeImmutable(is_string($validatedAt) ? $validatedAt : 'now');
        $response->wasAlreadyValidated = (bool)($ticketData['was_already_validated'] ?? false);
        $response->message = $message !== null && is_string($message) ? $message : null;
        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
