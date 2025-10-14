<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
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
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? '',
            url: $data['url'] ?? '',
            email: $data['email'] ?? '',
        );
    }
}

/**
 * Create E-Ticket Response
 * 
 * Response after successfully creating e-tickets.
 */
final class CreateEticketResponse extends AbstractResponse
{
    /**
     * @param array<EticketItem> $etickets List of created e-tickets
     */
    public function __construct(
        public readonly array $etickets,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $etickets = [];
        if (isset($data['etickets']) && is_array($data['etickets'])) {
            $etickets = array_map(
                fn(array $item): EticketItem => EticketItem::fromArray($item),
                $data['etickets']
            );
        }

        $instance = new self(etickets: $etickets);

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
