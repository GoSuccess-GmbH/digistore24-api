<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Get E-Ticket Settings Request
 *
 * Retrieves e-ticket configuration settings.
 */
final class GetEticketSettingsRequest extends AbstractRequest
{
    public function endpoint(): string
    {
        return '/getEticketSettings';
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
