<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Delivery;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class UpdateDeliveryRequest extends AbstractRequest
{
    public function __construct(private string $deliveryId, private array $data) {}
    public function getEndpoint(): string { return 'updateDelivery'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return array_merge(['delivery_id' => $this->deliveryId], $this->data);
    }
}
