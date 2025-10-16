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
     * @param array<string, mixed> $deliveries
     */
    public function __construct(private array $deliveries)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getDeliveries(): array
    {
        return $this->deliveries;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $deliveries = $innerData['deliveries'] ?? [];
        
        if (!is_array($deliveries)) {
            $deliveries = [];
        }
        
        /** @var array<string, mixed> $validatedDeliveries */
        $validatedDeliveries = $deliveries;
        
        return new self(deliveries: $validatedDeliveries);
    }
}
