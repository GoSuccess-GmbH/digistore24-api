<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Shipping;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Get Shipping Cost Policy Request
 *
 * Retrieves detailed information about a specific shipping cost policy.
 */
final class GetShippingCostPolicyRequest extends AbstractRequest
{
    /**
     * @param string $shippingCostPolicyId The unique identifier of the shipping cost policy
     */
    public function __construct(private string $shippingCostPolicyId)
    {
    }

    public function getEndpoint(): string
    {
        return '/getShippingCostPolicy';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        return ['shipping_cost_policy_id' => $this->shippingCostPolicyId];
    }
}
