<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Upsell;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetUpsellsRequest extends AbstractRequest
{
    public function __construct(private int $productId) {}
    public function getEndpoint(): string { return 'getUpsells'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['product_id' => $this->productId]; }
}
