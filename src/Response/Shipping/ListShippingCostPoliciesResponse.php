<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Shipping;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Shipping Cost Policies Response
 *
 * Response object for the Shipping API endpoint.
 */
final class ListShippingCostPoliciesResponse extends AbstractResponse
{
    /** @param array<string, mixed> $shippingCostPolicies */
    public function __construct(private array $shippingCostPolicies)
    {
    }

    /** @return array<string, mixed> */
    public function getShippingCostPolicies(): array
    {
        return $this->shippingCostPolicies;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $policiesData = $innerData['shipping_cost_policies'] ?? [];
        if (!is_array($policiesData)) {
            $policiesData = [];
        }
        /** @var array<string, mixed> $validatedPolicies */
        $validatedPolicies = $policiesData;

        return new self(shippingCostPolicies: $validatedPolicies);
    }
}
