<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Affiliate;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetAffiliateCommissionRequest extends AbstractRequest
{
    public function __construct(private int $productId, private string $affiliateId) {}
    public function getEndpoint(): string { return 'getAffiliateCommission'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array
    {
        return ['product_id' => $this->productId, 'affiliate_id' => $this->affiliateId];
    }
}
