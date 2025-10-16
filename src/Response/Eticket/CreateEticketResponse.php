<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

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
            foreach ($data['etickets'] as $item) {
                if (is_array($item)) {
                    /** @var array<string, mixed> $validatedItem */
                    $validatedItem = $item;
                    $etickets[] = EticketItem::fromArray($validatedItem);
                }
            }
        }

        $instance = new self(etickets: $etickets);

        return $instance;
    }
}
