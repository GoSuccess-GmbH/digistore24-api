<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Purchase Downloads Response
 *
 * Response object for the Purchase API endpoint.
 */
final class GetPurchaseDownloadsResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $downloads
     */
    public function __construct(private array $downloads)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getDownloads(): array
    {
        return $this->downloads;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $downloads = $innerData['downloads'] ?? [];
        if (!is_array($downloads)) {
            $downloads = [];
        }
        /** @var array<string, mixed> $validatedDownloads */
        $validatedDownloads = $downloads;

        return new self(downloads: $validatedDownloads);
    }
}
