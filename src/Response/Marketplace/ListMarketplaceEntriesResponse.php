<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Marketplace;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * List Marketplace Entries Response
 *
 * Response object for the Marketplace API endpoint.
 */
final readonly class ListMarketplaceEntriesResponse extends AbstractResponse
{
    public function __construct(private array $entries)
    {
    }

    public function getEntries(): array
    {
        return $this->entries;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(entries: $data['data']['entries'] ?? []);
    }
}