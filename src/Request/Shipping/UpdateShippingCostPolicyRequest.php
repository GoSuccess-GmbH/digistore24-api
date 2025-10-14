<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Shipping;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdateShippingCostPolicyRequest extends AbstractRequest
{
    public function __construct(private string $shippingCostPolicyId, private array $data) {}
    public function getEndpoint(): string { return 'updateShippingCostPolicy'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['shipping_cost_policy_id' => $this->shippingCostPolicyId], $this->data);
    }
}
