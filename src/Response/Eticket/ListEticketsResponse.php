<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

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
        $innerData = self::extractInnerData($data);
        $tickets = [];

        $ticketsData = $innerData['tickets'] ?? [];

        if (is_array($ticketsData)) {
            foreach ($ticketsData as $ticket) {
                if (! is_array($ticket)) {
                    continue;
                }
                /** @var array<string, mixed> $validatedTicket */
                $validatedTicket = $ticket;
                $tickets[] = EticketListItem::fromArray($validatedTicket);
            }
        }

        $totalCount = $innerData['total_count'] ?? count($tickets);

        return new self(
            tickets: $tickets,
            totalCount: TypeConverter::toInt($totalCount) ?? count($tickets),
        );
    }
}
