<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get E-Ticket Response
 *
 * Response containing e-ticket details.
 */
final class GetEticketResponse extends AbstractResponse
{
    public function __construct(
        public readonly EticketDetail $ticket,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        // Support both direct and nested data structures
        $ticketData = $data['data'] ?? $data;
        if (!is_array($ticketData)) {
            $ticketData = [];
        }
        /** @var array<string, mixed> $validatedTicketData */
        $validatedTicketData = $ticketData;

        return new self(
            ticket: EticketDetail::fromArray($validatedTicketData),
        );
    }
}
