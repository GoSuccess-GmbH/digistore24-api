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
    public function __construct(private array $deliveries)
    {
    }

    public function getDeliveries(): array
    {
        return $this->deliveries;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        
return new self(deliveries: $innerData['deliveries'] ?? []);
    }
}
