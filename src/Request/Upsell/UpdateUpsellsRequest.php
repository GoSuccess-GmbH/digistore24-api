<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Upsell;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdateUpsellsRequest extends AbstractRequest
{
    public function __construct(private int $productId, private array $data) {}
    public function getEndpoint(): string { return 'updateUpsells'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['product_id' => $this->productId], $this->data);
    }
}
