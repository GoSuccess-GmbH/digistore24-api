<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Delivery;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class GetDeliveryRequest extends AbstractRequest
{
    public function __construct(private string $deliveryId) {}
    public function getEndpoint(): string { return 'getDelivery'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['delivery_id' => $this->deliveryId]; }
}
