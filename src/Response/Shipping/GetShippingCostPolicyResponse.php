<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Shipping;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class GetShippingCostPolicyResponse extends AbstractResponse
{
    public function __construct(private array $shippingCostPolicy)
    {
    }
    public function getShippingCostPolicy(): array
    {
        return $this->shippingCostPolicy;
    }
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(shippingCostPolicy: $data['data']['shipping_cost_policy'] ?? []);
    }
}
