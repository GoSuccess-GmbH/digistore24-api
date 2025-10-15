<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Shipping;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Shipping Cost Policies Request
 *
 * Retrieves a list of all shipping cost policies.
 */
final class ListShippingCostPoliciesRequest extends AbstractRequest
{
    public function __construct() {}

    public function getEndpoint(): string { return 'listShippingCostPolicies'; }

    public function method(): Method { return Method::GET; }

    public function toArray(): array { return []; }
}
