<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Marketplace;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Marketplace Entries Response
 *
 * Response object for the Marketplace API endpoint.
 */
final class ListMarketplaceEntriesResponse extends AbstractResponse
{
    /** @param array<string, mixed> $entries */
    public function __construct(private array $entries)
    {
    }

    /** @return array<string, mixed> */
    public function getEntries(): array
    {
        return $this->entries;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $entriesData = $innerData['entries'] ?? [];
        if (! is_array($entriesData)) {
            $entriesData = [];
        }
        /** @var array<string, mixed> $validatedEntries */
        $validatedEntries = $entriesData;

        return new self(entries: $validatedEntries);
    }
}
