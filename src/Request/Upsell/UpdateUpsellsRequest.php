<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Upsell;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class UpdateUpsellsRequest extends AbstractRequest
{
    public function __construct(private int $productId, private array $data) {}
    public function endpoint(): string { return 'updateUpsells'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return array_merge(['product_id' => $this->productId], $this->data);
    }
}
