<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

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
            totalCount: (int)($data['data']['total_count'] ?? $data['total_count'] ?? count($tickets)),
        );
    }
}
