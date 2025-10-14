<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Shipping;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class ListShippingCostPoliciesResponse extends AbstractResponse
{
    public function __construct(private array $shippingCostPolicies) {}
    public function getShippingCostPolicies(): array { return $this->shippingCostPolicies; }
    public static function fromArray(array $data): self
    {
        return new self(shippingCostPolicies: $data['data']['shipping_cost_policies'] ?? []);
    }
}
