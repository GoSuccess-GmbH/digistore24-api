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
    public string $result { get => $this->result ?? ''; }

    /** @var array<string, mixed> */
    public array $tracking { get => $this->tracking ?? []; }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $tracking = $data['data'] ?? [];
        if (! is_array($tracking)) {
            $tracking = [];
        }
        /** @var array<string, mixed> $validatedTracking */
        $validatedTracking = $tracking;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->tracking = $validatedTracking;
        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
