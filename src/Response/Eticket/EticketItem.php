<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Http\Response;

/**
 * E-Ticket Item
 *
 * Represents a single created e-ticket.
 */
final class EticketItem
{
    public function __construct(
        public readonly string $id,
        public readonly string $url,
        public readonly string $email,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $id = $data['id'] ?? '';
        $url = $data['url'] ?? '';
        $email = $data['email'] ?? '';

        return new self(
            id: is_string($id) ? $id : '',
            url: is_string($url) ? $url : '',
            email: is_string($email) ? $email : '',
        );
    }
}
