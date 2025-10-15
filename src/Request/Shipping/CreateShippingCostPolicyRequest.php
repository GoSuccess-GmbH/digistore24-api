<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Shipping;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\ShippingCostPolicyData;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Shipping Cost Policy Request
 *
 * Creates a new shipping cost policy for physical product delivery.
 */
final class CreateShippingCostPolicyRequest extends AbstractRequest
{
    /**
     * @param ShippingCostPolicyData $policy The shipping cost policy configuration
     */
    public function __construct(private ShippingCostPolicyData $policy) {}

    public function getEndpoint(): string { return '/createShippingCostPolicy'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array { return $this->policy->toArray(); }
}
