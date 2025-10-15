<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Delivery;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * List Deliveries Response
 *
 * Response object for the Delivery API endpoint.
 */
final class ListDeliveriesResponse extends AbstractResponse
{
    public function __construct(private array $deliveries)
    {
    }

    public function getDeliveries(): array
    {
        return $this->deliveries;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(deliveries: $data['data']['deliveries'] ?? []);
    }
}
