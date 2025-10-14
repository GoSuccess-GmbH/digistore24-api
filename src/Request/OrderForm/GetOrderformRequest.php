<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\OrderForm;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class GetOrderformRequest extends AbstractRequest
{
    public function __construct(private string $orderformId) {}
    public function getEndpoint(): string { return 'getOrderform'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['orderform_id' => $this->orderformId]; }
}
