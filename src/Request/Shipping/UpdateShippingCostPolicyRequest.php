<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Shipping;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Update Shipping Cost Policy Request
 *
 * Updates an existing shipping cost policy's configuration.
 */
final class UpdateShippingCostPolicyRequest extends AbstractRequest
{
    /**
     * @param string $shippingCostPolicyId The unique identifier of the shipping cost policy to update
     * @param array $data The updated shipping cost policy configuration
     */
    public function __construct(private string $shippingCostPolicyId, private array $data) {}

    public function getEndpoint(): string { return '/updateShippingCostPolicy'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array
    {
        return array_merge(['shipping_cost_policy_id' => $this->shippingCostPolicyId], $this->data);
    }
}
