<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Shipping;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class CreateShippingCostPolicyRequest extends AbstractRequest
{
    public function __construct(private array $data) {}
    public function getEndpoint(): string { return 'createShippingCostPolicy'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array { return $this->data; }
}
