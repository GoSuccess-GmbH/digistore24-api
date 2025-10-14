<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Affiliate;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class GetAffiliateCommissionRequest extends AbstractRequest
{
    public function __construct(private int $productId, private string $affiliateId) {}
    public function endpoint(): string { return 'getAffiliateCommission'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array
    {
        return ['product_id' => $this->productId, 'affiliate_id' => $this->affiliateId];
    }
}
