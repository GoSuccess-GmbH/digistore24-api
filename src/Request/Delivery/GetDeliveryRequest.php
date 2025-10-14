<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Delivery;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class GetDeliveryRequest extends AbstractRequest
{
    public function __construct(private string $deliveryId) {}
    public function endpoint(): string { return 'getDelivery'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['delivery_id' => $this->deliveryId]; }
}
