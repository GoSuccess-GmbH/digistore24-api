<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Shipping;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Shipping Cost Policy Response
 *
 * Response object for the Shipping API endpoint.
 */
final class GetShippingCostPolicyResponse extends AbstractResponse
{
    public function __construct(private array $shippingCostPolicy)
    {
    }

    public function getShippingCostPolicy(): array
    {
        return $this->shippingCostPolicy;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        
return new self(shippingCostPolicy: $innerData['shipping_cost_policy'] ?? []);
    }
}
