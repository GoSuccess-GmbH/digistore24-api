<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Shipping;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class CreateShippingCostPolicyRequest extends AbstractRequest
{
    public function __construct(private array $data) {}
    public function getEndpoint(): string { return 'createShippingCostPolicy'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return $this->data; }
}
