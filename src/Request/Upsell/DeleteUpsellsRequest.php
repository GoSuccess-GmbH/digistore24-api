<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Upsell;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class DeleteUpsellsRequest extends AbstractRequest
{
    public function __construct(private int $productId) {}
    public function getEndpoint(): string { return 'deleteUpsells'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return ['product_id' => $this->productId]; }
}
