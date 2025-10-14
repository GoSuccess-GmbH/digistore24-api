<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Affiliate;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdateAffiliateCommissionRequest extends AbstractRequest
{
    public function __construct(private int $productId, private string $affiliateId, private array $data) {}
    public function getEndpoint(): string { return 'updateAffiliateCommission'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['product_id' => $this->productId, 'affiliate_id' => $this->affiliateId], $this->data);
    }
}
