<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Delivery;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdateDeliveryRequest extends AbstractRequest
{
    public function __construct(private string $deliveryId, private array $data) {}
    public function getEndpoint(): string { return 'updateDelivery'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['delivery_id' => $this->deliveryId], $this->data);
    }
}
