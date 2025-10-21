<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Delivery;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Deliveries Response
 *
 * Response object for the Delivery API endpoint.
 */
final class ListDeliveriesResponse extends AbstractResponse
{
    /**
     * Result status
     */
    public string $result {
        get => $this->result ?? '';
    }

    /**
     * Deliveries data
     *
     * @var array<string, mixed>
     */
    public array $deliveries {
        get => $this->deliveries ?? [];
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData(data: $data);
        $deliveries = $innerData['deliveries'] ?? [];

        if (! is_array($deliveries)) {
            $deliveries = [];
        }

        /** @var array<string, mixed> $validatedDeliveries */
        $validatedDeliveries = $deliveries;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->deliveries = $validatedDeliveries;

        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
