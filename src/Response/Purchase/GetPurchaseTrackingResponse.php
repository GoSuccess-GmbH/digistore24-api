<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Get Purchase Tracking Response
 *
 * Response object for the Purchase API endpoint.
 */
final readonly class GetPurchaseTrackingResponse extends AbstractResponse
{
    public function __construct(private array $tracking)
    {
    }

    public function getTracking(): array
    {
        return $this->tracking;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(tracking: $data['data'] ?? []);
    }
}
