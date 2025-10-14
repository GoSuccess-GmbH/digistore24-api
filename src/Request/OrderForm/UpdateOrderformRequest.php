<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\OrderForm;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdateOrderformRequest extends AbstractRequest
{
    public function __construct(private string $orderformId, private array $data) {}
    public function getEndpoint(): string { return 'updateOrderform'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['orderform_id' => $this->orderformId], $this->data);
    }
}
