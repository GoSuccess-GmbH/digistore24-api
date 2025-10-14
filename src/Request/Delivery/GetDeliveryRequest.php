<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Delivery;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetDeliveryRequest extends AbstractRequest
{
    public function __construct(private string $deliveryId) {}
    public function getEndpoint(): string { return 'getDelivery'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['delivery_id' => $this->deliveryId]; }
}
