<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\OrderForm;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetOrderformRequest extends AbstractRequest
{
    public function __construct(private string $orderformId) {}
    public function getEndpoint(): string { return 'getOrderform'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['orderform_id' => $this->orderformId]; }
}
