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
    /** @param array<string, mixed> $shippingCostPolicy */
    public function __construct(private array $shippingCostPolicy)
    {
    }

    /** @return array<string, mixed> */
    public function getShippingCostPolicy(): array
    {
        return $this->shippingCostPolicy;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $policyData = $innerData['shipping_cost_policy'] ?? [];
        if (!is_array($policyData)) {
            $policyData = [];
        }
        /** @var array<string, mixed> $validatedPolicy */
        $validatedPolicy = $policyData;

        return new self(shippingCostPolicy: $validatedPolicy);
    }
}
