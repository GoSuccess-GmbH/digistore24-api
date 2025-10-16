<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Purchase Tracking Response
 *
 * Response object for the Purchase API endpoint.
 */
final class GetPurchaseTrackingResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $tracking
     */
    public function __construct(private array $tracking)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getTracking(): array
    {
        return $this->tracking;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $tracking = $data['data'] ?? [];
        if (!is_array($tracking)) {
            $tracking = [];
        }
        /** @var array<string, mixed> $validatedTracking */
        $validatedTracking = $tracking;

        return new self(tracking: $validatedTracking);
    }
}
