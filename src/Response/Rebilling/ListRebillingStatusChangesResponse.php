<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Rebilling;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Rebilling Status Changes Response
 *
 * Response object for the Rebilling API endpoint.
 */
final class ListRebillingStatusChangesResponse extends AbstractResponse
{
    public function __construct(private array $statusChanges)
    {
    }

    public function getStatusChanges(): array
    {
        return $this->statusChanges;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(statusChanges: $data['data']['status_changes'] ?? []);
    }
}
