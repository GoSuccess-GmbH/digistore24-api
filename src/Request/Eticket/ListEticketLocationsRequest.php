<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * List E-Ticket Locations Request
 *
 * Lists all available e-ticket locations.
 */
final class ListEticketLocationsRequest extends AbstractRequest
{
    public function endpoint(): string
    {
        return '/listEticketLocations';
    }

    public function toArray(): array
    {
        return [];
    }

    public function validate(): array
    {
        return [];
    }
}
