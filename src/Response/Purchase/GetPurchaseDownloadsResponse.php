<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Get Purchase Downloads Response
 *
 * Response object for the Purchase API endpoint.
 */
final class GetPurchaseDownloadsResponse extends AbstractResponse
{
    public function __construct(private array $downloads)
    {
    }

    public function getDownloads(): array
    {
        return $this->downloads;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(downloads: $data['data']['downloads'] ?? []);
    }
}
