<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Shipping;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetShippingCostPolicyRequest extends AbstractRequest
{
    public function __construct(private string $shippingCostPolicyId) {}
    public function getEndpoint(): string { return 'getShippingCostPolicy'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['shipping_cost_policy_id' => $this->shippingCostPolicyId]; }
}
