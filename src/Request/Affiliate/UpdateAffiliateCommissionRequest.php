<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Affiliate;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class UpdateAffiliateCommissionRequest extends AbstractRequest
{
    public function __construct(private int $productId, private string $affiliateId, private array $data) {}
    public function getEndpoint(): string { return 'updateAffiliateCommission'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return array_merge(['product_id' => $this->productId, 'affiliate_id' => $this->affiliateId], $this->data);
    }
}
