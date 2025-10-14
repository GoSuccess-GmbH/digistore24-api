<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Shipping;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class GetShippingCostPolicyRequest extends AbstractRequest
{
    public function __construct(private string $shippingCostPolicyId) {}
    public function getEndpoint(): string { return 'getShippingCostPolicy'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['shipping_cost_policy_id' => $this->shippingCostPolicyId]; }
}
