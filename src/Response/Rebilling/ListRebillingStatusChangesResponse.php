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
    /**
     * @param array<string, mixed> $statusChanges
     */
    public function __construct(private array $statusChanges)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getStatusChanges(): array
    {
        return $this->statusChanges;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $statusChanges = $innerData['status_changes'] ?? [];
        
        if (!is_array($statusChanges)) {
            $statusChanges = [];
        }
        
        /** @var array<string, mixed> $validatedStatusChanges */
        $validatedStatusChanges = $statusChanges;
        
        return new self(statusChanges: $validatedStatusChanges);
    }
}
