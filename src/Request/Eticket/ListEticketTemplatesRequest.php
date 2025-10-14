<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * List E-Ticket Templates Request
 *
 * Lists all available e-ticket templates.
 */
final class ListEticketTemplatesRequest extends AbstractRequest
{
    public function endpoint(): string
    {
        return '/listEticketTemplates';
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
