<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\OrderForm;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class UpdateOrderformRequest extends AbstractRequest
{
    public function __construct(private string $orderformId, private array $data) {}
    public function endpoint(): string { return 'updateOrderform'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return array_merge(['orderform_id' => $this->orderformId], $this->data);
    }
}
